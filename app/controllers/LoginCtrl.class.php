<?php

namespace app\controllers;

use app\transfer\User;
use app\forms\LoginForm;
use app\forms\UserrForm;
use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;
class LoginCtrl{
	
	private $form;
	public $pas = 0;
	private $us;
	private $data;
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new LoginForm();
		$this->us = new UserrForm();
	}
	
	public function getParams(){
		// 1. pobranie parametrów
		$this->form->login = ParamUtils::getFromRequest('login');
		$this->form->pass = ParamUtils::getFromRequest('pass');
		$this ->form->ad = 0;
	}
	
	public function validate() {
		$this -> getParams();
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->login ) && isset ( $this->form->pass ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false;
		}
			
			// nie ma sensu walidować dalej, gdy brak parametrów
		
			
			// sprawdzenie, czy potrzebne wartości zostały przekazane
			if ($this->form->login == "" || $this->form->pass == "") {
				if($this->form->login == ""){
					App::getMessages()->addMessage('Nie podano loginu');
					
	
				}
				if($this->form->pass == ""){
					App::getMessages()->addMessage('Nie podano hasła');
					
	
				}

				return false;
			}
			
			
		

		//nie ma sensu walidować dalej, gdy brak wartości
		if ( !App::getMessages()->isError ()) {
			try{
				//	App::getDB()->
				
				
				$data2 = App::getDB()->select("users", [
					"ID_user"
					
				],["Login[=]" => $this->form->login]);
				
				foreach($data2 as $item){
					$id_uzytkownika = $item["ID_user"];
					$_SESSION ['id'] = $item["ID_user"];
				}
				//getMessages()->addError($this->us->$id_uzytkownika);

				$data = App::getDB()->select("users", [
					"Login",
					"Hasło",
					"rola"
				]);
				
				
				
	
			}catch (\PDOException $ex){
				//getMessages()-> addError("DB Error1: ", $ex->getMessage());
				App::getMessages()->addMessage  ("DB Error1: ");
			}
		
			// sprawdzenie, czy dane logowania poprawne
			// (takie informacje najczęściej przechowuje się w bazie danych)
			foreach($data as $item){
				
			if ($this->form->login == $item["Login"] && $this->form->pass == $item["Hasło"] && $item["rola"]=='admin') {
				$ad = 1;
				//sesja już rozpoczęta w init.php, więc działamy ...
				$user = new User($this->form->login, 'admin');
				// zaipsz obiekt użytkownika w sesji
				$_SESSION['user'] = serialize($user);
				// dodaj rolę użytkownikowi (jak wiemy, zapisane też w sesji)
				RoleUtils::addRole($user->role);
				$pas = 1;
				$this ->form->ad = 1;

			} else if ($this->form->login == $item["Login"] && $this->form->pass == $item["Hasło"] && $item["rola"]=='user') {

				//sesja już rozpoczęta w init.php, więc działamy ...
				$user = new User($this->form->login, 'user');
				// zaipsz obiekt użytkownika w sesji
				$_SESSION['user'] = serialize($user);
				// dodaj rolę użytkownikowi (jak wiemy, zapisane też w sesji)
				RoleUtils::addRole($user->role);
				$pas = 1;
				

			}
			
			}	
			
			if($pas == 0) {
				
				App::getMessages()->addMessage  ("Nie ma takiego konta");
				return false;
			}
		}
		
		return ! App::getMessages()->isError();
	}
	
	public function action_login(){
	
		

		$this->getParams();
		
		if ($this->validate()){
			 if($this ->form->ad == 1 && $pas = 1){
				$this->generateView3(); 
			}
			else if($this ->form->ad == 0 && $pas = 1){
				$this->generateView4();
			}
			else{
				App::getSmarty()->assign('us',$this->us);
				$this->generateView(); 
				//App::getSmarty()->assign('id_uzytkownika',$id_uzytkownika);
				//zalogowany => przekieruj na stronę główną, gdzie uruchomiona zostanie domyślna akcja
			//header("Location: ".getConf()->app_url."/");
			}
			
		} 
		
		
		else  {
			//niezalogowany => wyświetl stronę logowania
			$this->generateView(); 
		}
		
	}
	
	public function action_logout(){
		// 1. zakończenie sesji - tylko kończymy, jesteśmy już podłączeni w init.php
		session_destroy();
		
		// 2. wyświetl stronę logowania z informacją
		
		App::getMessages()->addMessage  ('Poprawnie wylogowano z systemu');
		$this->generateView();		 
	}
	
	
	public function generateView(){
		
		App::getSmarty()->assign('page_title','CARENT');
		App::getSmarty()->assign('form',$this->form);
		App::getSmarty()->display('LoginView.tpl');		
	}
	public function action_rejestr(){

        $this->generateView2();	

		
	}
	public function generateView4(){
		
		App::getSmarty()->assign('page_title','CARENT');
		App::getSmarty()->assign('form',$this->form);
		App::getSmarty()->display('UserrView.tpl');		
	}
    

    public function generateView2(){
		
		App::getSmarty()->assign('page_title','CARENT');
		App::getSmarty()->assign('form',$this->form);
		App::getSmarty()->display('RejestrView.tpl');		
	}
	public function generateView3(){
		//App::getSmarty()->assign('us',$this->us);
		//App::getSmarty()->assign('ID_uzytkownika',$this->id_uzytkownika);
		App::getSmarty()->assign('page_title','CARENT');
		App::getSmarty()->assign('form',$this->form);
		App::getSmarty()->display('AdminView.tpl');		
	}
}