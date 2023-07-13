<?php

namespace app\controllers;
use app\forms\RejestrForm;
use core\User;
use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
class RejestrCtrl{
	private $form;

  
	public function __construct(){

		$this->form = new RejestrForm();
		
		//stworzenie potrzebnych obiektów
		/*$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->cal = new CalcResult();
		$this->kk = new CalcResult();
		$this->hide_intro = false;*/
	}

	public function getParams(){
		$this->form->log = ParamUtils::getFromRequest('log');
		$this->form->passw = ParamUtils::getFromRequest('passw');
		$this->form->imie = ParamUtils::getFromRequest('imie');
		$this->form->nazwisko = ParamUtils::getFromRequest('nazwisko');
		$this->form->wiek = ParamUtils::getFromRequest('wiek');
		$this->form->nr_tel= ParamUtils::getFromRequest('nr_tel');
	}
	public function validate(){
		if ( ! (isset($this->form->log) && isset($this->form->passw ) && isset($this->form->imie) && isset($this->form->nazwisko) && isset($this->form->wiek) && isset($this->form->nr_tel) )) {
			
			return false;
		}
	

		if ($this->form->log=="" || $this->form->passw=="" ||  $this->form->imie=="" ||  $this->form->nazwisko=="" ||  $this->form->wiek=="" ||  $this->form->nr_tel=="") {
			if($this->form->log == ""){
				App::getMessages()->addMessage('Nie podano loginu');
				

			}
			if($this->form->passw == ""){
				App::getMessages()->addMessage('Nie podano hasła');
				

			}
			if($this->form->imie == ""){
				App::getMessages()->addMessage('Nie podano imienia');
				

			}
			if($this->form->imie == ""){
				App::getMessages()->addMessage('Nie podano nazwiska');
				

			}
			if($this->form->imie == ""){
				App::getMessages()->addMessage('Nie podano wieku');
				

			}
			if($this->form->imie == ""){
				App::getMessages()->addMessage('Nie podano numeru telefonu');
				

			}

			return false;
		}
		if($this->form->wiek<18){
			App::getMessages()->addMessage('Masz mniej niż 18 lat!');
			return false;
		}

		return ! App::getMessages()->isError();
	
	}

	public function action_rejestr(){
		$this->getparams();
		if ($this->validate()) {

			
		try{


			App::getDB()->insert("users", [
				"Login" => $this->form->log ,
				"Hasło" => $this->form->passw ,
				"Imie" => $this->form->imie,
				"Nazwisko" => $this->form->nazwisko ,
				"Numer_telefonu" => $this->form->nr_tel,
				"Wiek" => $this->form->wiek,
				"rola" => 'user'
				
			]);

		}catch (\PDOException $ex){
			App::getMessages()->addMessage  ("DB Error1: ");
		}

		}
		

			$this->generateView();


	}


    public function action_rejestrshow(){

        $this->generateView();	

		

		
	}

    

    public function generateView(){
		
		App::getSmarty()->assign('page_title','CARENT');
		App::getSmarty()->assign('form',$this->form);
		App::getSmarty()->display('RejestrView.tpl');		
	}
}