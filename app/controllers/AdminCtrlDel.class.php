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

class AdminCtrlDel {

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
    App::getMessages()->addMessage('Usunięto');
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

