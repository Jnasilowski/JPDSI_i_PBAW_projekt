<?php
// KONTROLER strony kalkulatora


// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.
namespace app\controllers;
use app\forms\CalcForm;
use app\transfer\CalcResult;
// 1. pobranie parametrów
class CalcCtrl {

	private $msgs;   //wiadomości dla widoku
	private $infos;  //informacje dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku
	private $hide_intro; //zmienna informująca o tym czy schować intro


	public function __construct(){

		$this->form = new CalcForm();
		$this->result = new CalcResult();
		//stworzenie potrzebnych obiektów
		/*$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->cal = new CalcResult();
		$this->kk = new CalcResult();
		$this->hide_intro = false;*/
	}

public function getParams(){
	$this->form->N = getFromRequest('N');
	$this->form->r = getFromRequest('r');
	$this->form->k = getFromRequest('k');
	$this->form->n = getFromRequest('n');
}





// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
public function validate(){


if(!inRole('admin')){
	getMessages()->addError('Musisz być zalogowany jako ADMIN');
}
// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($this->form->N) && isset($this->form->r) && isset($this->form->k) && isset($this->form->n) )) {
	
	return false;
}

// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $this->form->N == "") {
	getMessages()->addError('Nie podano kwoty udzielonego kredytu!');
}
if ( $this->form->r == "") {
	getMessages()->addError('Nie podano oprocentowania!');
}
if ( $this->form->k == "") {
	getMessages()->addError('Nie podano liczby rat płatnych w skali roku!');
}
if ( $this->form->n == "") {
	getMessages()->addError('Nie podano liczby rat!');
}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (! getMessages()->isError()){
	
	
		if (! is_numeric( $this->form->N )) {
			getMessages()->addError('Pierwsza wartość nie jest liczbą całkowitą!');
		}
		
		if (! is_numeric( $this->form->r)) {
			getMessages()->addError('Druga wartość nie jest liczbą zmiennoprzecinkową!');
		}
		if (! is_numeric( $this->form->k)) {
			getMessages()->addError('Trzecia wartość nie jest liczbą całkowitą!');
		}	
		if (! is_numeric( $this->form->n )) {
			getMessages()->addError('Czwarta wartość nie jest liczbą całkowitą!');
		}		
		
	}
	return ! getMessages()->isError();
	
}

public function action_calcCompute(){
// 3. wykonaj zadanie jeśli wszystko w porządku
		$this->getparams();

		if ($this->validate()) {
		//konwersja parametrów na int
		$this->form->N = doubleval($this->form->N );
		$this->form->r = doubleval($this->form->r );
		$this->form->k = doubleval($this->form->k );
		$this->form->n= doubleval($this->form->n );
		$this->form->r=$this->form->r/100;
		$d = 1;
		
		
		for ($x=0; $x<$this->form->n; $x++) {
		$d = $d * ($this->form->k/($this->form->k+$this->form->r));
	}
		$d =(1-$d);
		$d = $this->form->k * $d;
		$this->result->result = ($this->form->N*$this->form->r);
		$this->result->result = round(($this->result->result/ $d), 2);
		
		$this->result->cal = round(($this->form->n*$this->result->result),2);
		$this->result->kk = round(($this->result->cal - $this->form->N),2);
	
		getMessages()->addInfo('Wykonano obliczenia.');
		try{

			$database = new \Medoo\Medoo([
				'database_type' =>'mysql',
				'database_name' =>'kalk',
				'server' => 'localhost',
				'username' => 'root',
				'password' => '',
				'charset' => 'utf8',
				'collation' =>'utf8_polish_ci',
				'port' => 3306,
				'option' => [
					\PDO::ATTR_CASE => \PDO::CASE_NATURAL,
					\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
					//rata kredytu, całkowita kwota spłaty, koszt kredytu
				]

			]);

			$database ->insert("wynik", [
				"Rata_kredytu" => $this ->result->result,
				"Calkowita_kwota_splaty" => $this ->result->cal,
				"kosz_kredytu" => $this ->result->kk,
				
			]);

		}catch (\PDOException $ex){
			getMessages()-> addError("DB Error: ", $ex->getMessage());
		}
	}
	$this->generateView();
}
public function action_calcShow(){
	getMessages()->addInfo('Witaj w kalkulatorze');
	$this->generateView();
}
public function generateView(){
	
	
		
		getSmarty()->assign('page_title','CARENT');
		getSmarty()->assign('page_header','Kontroler główny');
		getSmarty()->assign('user',unserialize($_SESSION['user']));		
		getSmarty()->assign('hide_intro',$this->hide_intro);
		
		
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('result',$this->result);
		
		getSmarty()->display('UserrView.tpl');
		getSmarty()->assign('cal',$this->cal);
		getSmarty()->assign('kk',$this->kk);

	
	// 5. Wywołanie szablonu
}
}