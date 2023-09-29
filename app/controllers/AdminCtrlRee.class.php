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

class AdminCtrlRee {

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


    public function action_adminree(){	
        $licznik =1;
        $tablica = array();
        
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
    
                
                    
                foreach($data3 as $item3){
                    $tekst3 =$tekst3.'<br><br>Dane klienta: <br><br> Imie: '.$item3['Imie'].'<br> Nazwisko: '.$item3['Nazwisko'].'<br> Numer telefonu: '.$item3['Numer_telefonu'].'<br><br>';
    
                }
                array_push($tablica,$tekst3);
            }    
                   
            }
            
    
        }catch (\PDOException $ex){
            App::getMessages()->addMessage  (new Message("DB Error1: ", Message::ERROR));
        }
    
        
        App::getSmarty()->assign('list',$data);
        App::getSmarty()->assign('list2',$data2);
        App::getSmarty()->assign('list3',$data3);
        App::getSmarty()->assign('licznik',$licznik);
        App::getSmarty()->assign('tablica',$tablica);
    
            $this->generateView();
    
    
    }
    public function generateView(){
	
        App::getSmarty()->assign('page_title','CARENT');
        App:: getSmarty()->assign('form',$this->form);
        //App:: getSmarty()->assign('a',$this->getMessages());
        //App:: getSmarty()->assign('c',App::getMessage(0));
        App:: getSmarty()->display('AdminViewRee.tpl');	
    }	
    }