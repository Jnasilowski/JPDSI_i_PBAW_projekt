<?php
namespace app\controllers;
use app\forms\AdminForm;
use app\forms\LoginForm;
use app\forms\UserrForm;
use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;
use app\transfer\User;

class AdminCtrl {

private $form; 
public $tekst3='';

public function __construct(){

    $this->form = new AdminForm();
	
}
public function getParams(){
    $this->form->Marka = ParamUtils::getFromRequest('Marka');
    $this->form->Model =ParamUtils:: getFromRequest('Model');
    $this->form->Rocznik =ParamUtils:: getFromRequest('Rocznik');
    $this->form->Color =ParamUtils:: getFromRequest('Color');
    $this->form->photo_name =ParamUtils:: getFromRequest('photo_name');
	$this->form->Nr_sam =ParamUtils:: getFromRequest('Nr_sam');
   
}
public function getParams2(){
	$this->form->Nr_sam = ParamUtils::getFromRequest('Nr_sam');
}

public function validate(){


    if ( ! (isset($this->form->Marka) && isset($this->form->Model) && isset($this->form->Rocznik) && isset($this->form->Color) && isset($this->form->photo_name) )) {
	
        return false;
    }
	else if(($this->form->Marka) ==''){
		return false;
	}

    
	return ! App::getMessages()->isError();
}



public function action_adminadd(){
    
		$this->getparams();
		if ($this->validate()) {

			
		try{

			App::getDB()->insert("cars", [
                //"id_samochodu" =>1,
				"Model" => $this->form->Model ,
				"Rocznik" => $this->form->Rocznik ,
				"Color" => $this->form->Color,
				"Marka" => $this->form->Marka ,
				"photo_name" => $this->form->photo_name
				
				
			]);
			$data = App::getDB()->select("cars", [
				"Model",
				"Rocznik",
				"Color",
				"Marka",
			]);
			
            

		}catch (\PDOException $ex){
			App::getMessages()->addMessage  (new Message("DB Error1: ", Message::ERROR));
		}

		}
		else{
			//getMessages()->addInfo('Błąd.');
			App::getMessages()->addMessage  (new Message("błąd ", Message::INFO));
		}

			$this->generateView();


}
public function action_adminlist(){
	$tekst = '<img src="img';
	$tekst2 = '" width = "300" height="300">';
	
	try{
		

		$data = App::getDB()->select("cars", [
			"Model",
			"Rocznik",
			"Color",
			"Marka",
			"photo_name"
		]);
		foreach($data as $item){
			//getMessages()->addInfo('Marka: '.$item["Marka"].' Model: '.$item['Model'].' Rocznik: '.$item['Rocznik'].'<br>'.$tekst.'/'.$item["photo_name"].$tekst2);
			App::getMessages()->addMessage  ('Marka: '.$item["Marka"].' Model: '.$item['Model'].' Rocznik: '.$item['Rocznik'].'<br>'.$tekst.'/'.$item["photo_name"].$tekst2);
			
		}
		//App::getSmarty()->assign('a',$msgs->getMessages());

	}catch (\PDOException $ex){
		App::getMessages()->addMessage  (new Message("DB Error1: ", Message::ERROR));
	}

	
	

		$this->generateView();


}

public function action_adminuserlist(){

	try{
		$data = App::getDB()->select("users", [
			"ID_user",
			"Login",
			"Imie",
			"Nazwisko",
			"Numer_telefonu",
			"Wiek"
		]);
		foreach($data as $item){
			$tekst3 = 'ID: '.$item["ID_user"].'<br> login: '.$item['Login'].'<br> Imie: '.$item['Imie'].'<br> Nazwisko: '.$item['Nazwisko'].'<br> Numer_telefonu: '.$item['Numer_telefonu'].'<br> Wiek: '.$item['Wiek'];
			//App::getMessages()->addMessage (new Message('zamowienie: '.$item["ID_zamowienia"].'<br> samochud nr: '.$item['Id_samochodu'].'<br> Użytkownika: '.$item['Id_uzytkownika'].'<br> od kiedy: '.$item['od_kiedy'].$item['Id_uzytkownika'].'<br> do kiedy: '.$item['do_kiedy'], Message::	));
			App::getMessages()->addMessage  ($tekst3);
		}
		

	}catch (\PDOException $ex){
		App::getMessages()->addMessage  (new Message("DB Error1: ", Message::ERROR));
	}

	
	

		$this->generateView();


}





public function action_adminree(){	
	
	try{
		$data = App::getDB()->select("zamowienia", [
			"ID_zamowienia",
			"Id_samochodu",
			"Id_uzytkownika",
			"od_kiedy",
			"do_kiedy"
		]);
		foreach($data as $item){
			$tekst3 = 'zamowienie: '.$item["ID_zamowienia"].'<br> samochód nr: '.$item['Id_samochodu'].'<br> Użytkownik nr: '.$item['Id_uzytkownika'].'<br> od kiedy: '.$item['od_kiedy'].$item['Id_uzytkownika'].'<br> do kiedy: '.$item['do_kiedy'];
			//App::getMessages()->addMessage (new Message('zamowienie: '.$item["ID_zamowienia"].'<br> samochud nr: '.$item['Id_samochodu'].'<br> Użytkownika: '.$item['Id_uzytkownika'].'<br> od kiedy: '.$item['od_kiedy'].$item['Id_uzytkownika'].'<br> do kiedy: '.$item['do_kiedy'], Message::	));
			App::getMessages()->addMessage  ($tekst3);
		}
		

	}catch (\PDOException $ex){
		App::getMessages()->addMessage  (new Message("DB Error1: ", Message::ERROR));
	}

	
	

		$this->generateView();


}
public function action_admindel(){
	$this->getparams2();
	try{
		
	
		App::getDB()->delete("cars", [
			"AND" => [
				"id_samochodu" =>$this->form->Nr_sam
				
			]
		]);
		

	}catch (\PDOException $ex){
		App::getMessages()->addMessage  (new Message("DB Error1: ", Message::ERROR));
	}
	$this->generateView();

	
}
public function generateView(){
	
    App::getSmarty()->assign('page_title','CARENT');
	App:: getSmarty()->assign('form',$this->form);
	//App:: getSmarty()->assign('a',$this->getMessages());
	//App:: getSmarty()->assign('c',App::getMessage(0));
	App:: getSmarty()->display('AdminView.tpl');	
}	
	
}

