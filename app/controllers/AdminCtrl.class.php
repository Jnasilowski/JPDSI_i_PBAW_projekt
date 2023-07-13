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

	
   
	if ($this->form->Marka=="" || $this->form->Model=="" ||  $this->form->Rocznik=="" ||  $this->form->Color=="" ||  $this->form->photo_name=="") {
		if($this->form->Marka == ""){
			App::getMessages()->addMessage('Nie podano marki');
			

		}
		if($this->form->Model== ""){
			App::getMessages()->addMessage('Nie podano modelu');
			

		}
		if($this->form->Rocznik == ""){
			App::getMessages()->addMessage('Nie podano rocznika');
			

		}
		if($this->form->Color == ""){
			App::getMessages()->addMessage('Nie podano koloru');
			

		}
		if($this->form->photo_name == ""){
			App::getMessages()->addMessage('Nie podano linku do zdjecia');
			

		}

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

			$this->generateView();


}
public function action_adminlist(){
	$tekst = '<img src="';
	$tekst2 = '" width = "400" height="300">';
	
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
			App::getMessages()->addMessage  ('Marka: '.$item["Marka"].' <br>Model: '.$item['Model'].'<br> Rocznik: '.$item['Rocznik'].'<br>'.$tekst.$item["photo_name"].$tekst2);
			
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
			$tekst3 = ' login: '.$item['Login'].'<br> Imie: '.$item['Imie'].'<br> Nazwisko: '.$item['Nazwisko'].'<br> Numer_telefonu: '.$item['Numer_telefonu'].'<br> Wiek: '.$item['Wiek'];
			//App::getMessages()->addMessage (new Message('zamowienie: '.$item["ID_zamowienia"].'<br> samochud nr: '.$item['Id_samochodu'].'<br> Użytkownika: '.$item['Id_uzytkownika'].'<br> od kiedy: '.$item['od_kiedy'].$item['Id_uzytkownika'].'<br> do kiedy: '.$item['do_kiedy'], Message::	));
			App::getMessages()->addMessage  ($tekst3);
		}
		

	}catch (\PDOException $ex){
		App::getMessages()->addMessage  (new Message("DB Error1: ", Message::ERROR));
	}

	
	

		$this->generateView();


}





public function action_adminree(){	
	$licznik =1;
	
	try{
		$data = App::getDB()->select("zamowienia", [
			"ID_zamowienia",
			"Id_samochodu",
			"Id_uzytkownika",
			"od_kiedy",
			"do_kiedy"
		]);

		

		foreach($data as $item){
				$tekst3 ='zamowienie nr: '.$licznik;
				$tekst3 = $tekst3.'<br>  od kiedy: '.$item['od_kiedy'].'<br> do kiedy: '.$item['do_kiedy'].' <br>';
				$licznik++;

				$data2 = App::getDB()->select("cars", [
					"id_samochodu",
					"Marka",
					"Model",
					"Color",
					"Rocznik"],["id_samochodu" =>$item["Id_samochodu"]
				]);
		
				$data3 = App::getDB()->select("users", [
					"ID_user",
					"Imie",
					"Nazwisko",
					"Numer_telefonu",
					],["ID_user" =>$item["Id_uzytkownika"]
				]);
				
			foreach($data2 as $item2){
				$tekst3 =$tekst3.'<br>Dane samochodu: <br><br> Marka: '.$item2['Marka'].'<br> Model: '.$item2['Model'].'<br> Kolor: '.$item2['Color'].'<br> Rocznik: '.$item2['Rocznik'];

			}
				
			foreach($data3 as $item3){
				$tekst3 =$tekst3.'<br><br>Dane klienta: <br><br> Imie: '.$item3['Imie'].'<br> Nazwisko: '.$item3['Nazwisko'].'<br> Numer telefonu: '.$item3['Numer_telefonu'].'<br><br>';

			}
				
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

	$licznik = 1;
	try{
		

		$data = App::getDB()->select("cars", [
			"id_samochodu"
			
		]);
		foreach($data as $item){
			if($licznik == $this->form->Nr_sam)
			{
				App::getDB()->delete("cars", [
					"AND" => [
						"id_samochodu" =>$item["id_samochodu"]
						
					]
				]);
			}
			$licznik++;
			
		}
		//App::getSmarty()->assign('a',$msgs->getMessages());

	}catch (\PDOException $ex){
		App::getMessages()->addMessage  (new Message("DB Error1: ", Message::ERROR));
	}

	$this->generateView();

	
}

public function action_adminedit(){

	$this->getparams();

	$licznik = 1;
	try{
		

		$data = App::getDB()->select("cars", [
			"id_samochodu",
			"Model",
			"Rocznik",
			"Color",
			"Marka",
			"photo_name"
			
		]);


		foreach($data as $item){
			if($licznik == $this->form->Nr_sam){
							if($this->form->Marka!="" ){
								App::getDB()->update("cars",[
									"Model"=>$this->form->Marka],[
										"id_samochodu" =>$item["id_samochodu"]
						]);
					}
							if($this->form->Rocznik!="" ){
								App::getDB()->update("cars",[
									"Rocznik"=>$this->form->Rocznik],[
										"id_samochodu" =>$item["id_samochodu"]
						]);
					}
							if($this->form->Color!="" ){
								App::getDB()->update("cars",[
									"Color"=>$this->form->Colork],[
										"id_samochodu" =>$item["id_samochodu"]
						]);
					}
							if($this->form->Model!="" ){
								App::getDB()->update("cars",[
									"Model"=>$this->form->Model],[
										"id_samochodu" =>$item["id_samochodu"]
						]);
					}
							if($this->form->photo_name!="" ){
								App::getDB()->update("cars",[
									"photo_name"=>$this->form->photo_name],[
										"id_samochodu" =>$item["id_samochodu"]
						]);
					}
						
			$licznik++;
			
		}
	
		$licznik++;
	}
		//App::getSmarty()->assign('a',$msgs->getMessages());

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

