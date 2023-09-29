<?php
namespace app\controllers;
use app\forms\UserrForm;
use app\controllers\LoginCtrl;
use app\transfer\User;

use core\App;
use core\Message;
use core\Utils;
use core\ParamUtils;

class UserrCtrlRent {

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
public function action_userrent(){
    $this->getparams2();
    $licznik = 1;
    $licznik2 = 1;
    $licznik3 = 1;
    $sprawdz = 0;
    $sprawdz2 = 0;
    $wyznacznik = 1;
    $tekst = '<img src="';
	$tekst2 = '" width = "400" height="300">';
    $tekst3;
    
  
    if ($this->validate()) {

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
        
        //$this->form->$id_uzytkownika=1;
		foreach($data as $item){
          
                
                if($wyznacznik == $this->form->Nr_samochodu2){
                    $sprawdz2 =1;
                   // App::getMessages()->addMessage($_SESSION ['id']);
                    App::getDB()->insert("zamowienia", [
                        //"id_samochodu" =>1,
                        "Id_samochodu" => $item['id_samochodu'],
                        "Id_uzytkownika" =>$_SESSION ['id'],
                        "od_kiedy" => $this->form->Od_kiedy2,
                        "do_kiedy" => $this->form->Do_kiedy2                         
                        
                        
                    ]);
                    App::getMessages()->addMessage("Udało się zamówić samochód!");

                }
                $wyznacznik++;
                //<input id="Nr_samochodu" type="text"  name="Nr_samochodu" value="">
             }
             
                
           
		
        
		
        }catch (\PDOException $ex){
        App::getMessages()->addMessage  ("DB Error1: ");
    }



    
}



        $this->generateView();

}


public function generateView(){
	
    App::getSmarty()->assign('page_title','CARENT');
    App::getSmarty()->assign('form',$this->form);
    App:: getSmarty()->display('UserrView.tpl');	
}	
}
