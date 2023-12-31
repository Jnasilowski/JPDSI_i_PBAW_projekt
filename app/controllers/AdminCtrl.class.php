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

