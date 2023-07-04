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

public function validate(){


    if  ($this->form->Nr_samochodu=="" || $this->form->Od_kiedy=="" || $this->form->Do_kiedy=="") {
	
        return false;
    }
	

    return ! App::getMessages()->addMessage  ("błąd ");

}
public function action_usercarlist(){

    $tekst = '<img src="img';
	$tekst2 = '" width = "300" height="300">';
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
        
        //$this->form->$id_uzytkownika=1;
		foreach($data as $item){
            $tekst3 ="Nr samochodu: ".$item["id_samochodu"].' |Marka: '.$item["Marka"].' |Model: '.$item['Model'].' |Rocznik: '.$item['Rocznik'].'<br>'.$tekst.'/'.$item["photo_name"].$tekst2;
			App::getMessages()->addMessage($tekst3);
            
		}
		

	}catch (\PDOException $ex){
		App::getMessages()->addMessage  ("DB Error1: ");
	}

	
	

		$this->generateView();


}

public function action_userrent(){


    $this-> __construct();
    $this->getparams();
    if ($this->validate()) {

        try{
        
        App::getDB()->insert("zamowienia", [
            //"id_samochodu" =>1,
            "Id_samochodu" => $this->form->Nr_samochodu ,
            "Id_uzytkownika" =>$_SESSION ['id'],
            "od_kiedy" => $this->form->Od_kiedy,
            "do_kiedy" => $this->form->Do_kiedy ,
            
            
            
        ]);
        $data = App::getDB()->select("cars", [
            "Model",
            "Rocznik",
            "Color",
            "Marka",
        ]);
        
        

    }catch (\PDOException $ex){
        App::getMessages()->addMessage  ("DB Error1: ");
    }

    }
    else{
        App::getMessages()->addMessage  ("Brak danych ");
    }

        $this->generateView();

}


public function generateView(){
	
    App::getSmarty()->assign('page_title','CARENT');
    App::getSmarty()->assign('form',$this->form);
    App:: getSmarty()->display('UserrView.tpl');	
}	
}
