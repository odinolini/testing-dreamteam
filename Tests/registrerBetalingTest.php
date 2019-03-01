<?php

include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class registrerBetalingTest extends PHPUnit\Framework\TestCase {

    public function testTomBetaling() {
        //arrange
        $transaksjon = new transaksjon();
        $kontoNr = "";
        $bank = new Bank(new BankDBStub());
        //act
        $result = $bank->registrerBetaling($kontoNr, $transaksjon);
        //assert
        $this->assertEquals("Feil", $result);
    }

    public function testNullBetaling() {
        //arrange
        $bank = new Bank(new BankDBStub());
        $transaksjon = new transaksjon();
        $idag = date("Y-m-d");
        
        $transaksjon->dato = $idag;
        $transaksjon->melding = "Betaling";
        $transaksjon->fraTilKontonummer = "12345678910";
        $transaksjon->transaksjonBelop = 0;
        $tilKontoNr = "10123456789";
        //act
        $result = $bank->registrerBetaling($tilKontoNr, $transaksjon);
        //assert
        $this->assertEquals("Feil", $result);
    }
    
    public function testBetaling() {
        //arrange
        $bank = new Bank(new BankDBStub());
        $transaksjon = new transaksjon();
        $idag = date("Y-m-d");
        
        $transaksjon->dato = $idag;
        $transaksjon->melding = "Betaling";
        $transaksjon->fraTilKontonummer = "12345678910";
        $transaksjon->transaksjonBelop = 500;
        $tilKontoNr = "10123456789";
        //act
        $result = $bank->registrerBetaling($tilKontoNr, $transaksjon);
        //assert
        $this->assertEquals("OK", $result);
    }
    
    public function testBetalingUgyldigDato() {
        //arrange
        $bank = new Bank(new BankDBStub());
        $transaksjon = new transaksjon();
        
        $transaksjon->dato = "1890-01-01";
        $transaksjon->melding = "Betaling";
        $transaksjon->fraTilKontonummer = "12345678910";
        $transaksjon->transaksjonBelop = 0;
        $tilKontoNr = "10123456789";
        //act
        $result = $bank->registrerBetaling($tilKontoNr, $transaksjon);
        //assert
        $this->assertEquals("Feil", $result);
    }
    
     public function testBetalingUgyldigKontoNr() {
        //arrange
        $bank = new Bank(new BankDBStub());
        $transaksjon = new transaksjon();
        $idag = date("Y-m-d");
        
        $transaksjon->dato = $idag;
        $transaksjon->melding = "Betaling";
        $transaksjon->fraTilKontonummer = "Nei";
        $transaksjon->transaksjonBelop = 0;
        $tilKontoNr = "Ja";
        //act
        $result = $bank->registrerBetaling($tilKontoNr, $transaksjon);
        //assert
        $this->assertEquals("Feil", $result);
    }
    
     public function testBetalingUgyldigBeløp() {
        //arrange
        $bank = new Bank(new BankDBStub());
        $transaksjon = new transaksjon();
        $idag = date("Y-m-d");
        
        $transaksjon->dato = $idag;
        $transaksjon->melding = "Betaling";
        $transaksjon->fraTilKontonummer = "12345678910";
        $transaksjon->transaksjonBelop = "hundre kroner";
        $tilKontoNr = "10123456789";
        //act
        $result = $bank->registrerBetaling($tilKontoNr, $transaksjon);
        //assert
        $this->assertEquals("Feil", $result);
    }
}
