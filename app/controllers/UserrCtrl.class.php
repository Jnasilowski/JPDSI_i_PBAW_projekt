<?php
namespace app\controllers;
use app\forms\UserrForm;
use app\controllers\LoginCtrl;
use app\transfer\User;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;

class UserrCtrl {

private $form; 


public function __construct(){

    $this->form = new UserrForm();
	
}
public function getParams(){
    $this->form->Nr_samochodu = ParamUtils::getFromRequest('Nr_samochodu');
    $this->form->Od_kiedy = ParamUtils::getFromRequest('Od_kiedy');
    $this->form->Do_kiedy = ParamUtils::getFromRequest('Do_kiedy');
   
}
public function getParams2(){
    $this->form->Nr_samochodu2 = ParamUtils::getFromRequest('Nr_samochodu2');
    $this->form->Od_kiedy2 = ParamUtils::getFromRequest('Od_kiedy2');
    $this->form->Do_kiedy2 = ParamUtils::getFromRequest('Do_kiedy2');
   
}

public function validate(){


    if  ($this->form->Nr_samochodu2=="" || $this->form->Od_kiedy2=="" || $this->form->Do_kiedy2=="") {
        App::getMessages()->addMessage  ("brak danych :c");
        App::getMessages()->addMessage  ($this->form->Nr_samochodu2.$this->form->Od_kiedy2.$this->form->Do_kiedy2);
        return false;
    }
	

    return ! App::getMessages()->addMessage  ("Przetworzyliśmy twoje zamówienie");

}
public function action_usercarlist(){
    $this->getparams();
    $licznik = 1;
    $licznik2 = 1;
    $licznik3 = 1;
    
    $sprawdz = 0;
    $tekst = '<img src="';
	$tekst2 = '" width = "400" height="300">';
    $tekst3;
	
	try{
		
		$data = App::getDB()->select("cars", [
            "id_samochodu",
			"Model",
			"Rocznik",
			"Color",
			"Marka",
			"photo_name"
		]);
        $data2 = App::getDB()->select("zamowienia", [
            "id_samochodu",
			"od_kiedy",
			"do_kiedy",
			
		]);

	}catch (\PDOException $ex){
		App::getMessages()->addMessage  ("DB Error1: ");
	}
    App::getSmarty()->assign('sprawdz',$sprawdz);
    $Od_kiedy = $this->form->Od_kiedy;
    $Do_kiedy = $this->form->Do_kiedy;
    App::getSmarty()->assign('Od_kiedy',$Od_kiedy);
    App::getSmarty()->assign('Do_kiedy',$Do_kiedy);
	App::getSmarty()->assign('licz1',$licznik);
    App::getSmarty()->assign('licz2',$licznik2);
    App::getSmarty()->assign('licz3',$licznik3 );
        App::getSmarty()->assign('list',$data);
        App::getSmarty()->assign('list2',$data2);
		$this->generateView();


}




public function generateView(){
	
    App::getSmarty()->assign('page_title','CARENT');
    App::getSmarty()->assign('form',$this->form);
    App:: getSmarty()->display('UserrView.tpl');	
}	
}
