<?php
include_once '../Model/domeneModell.php';

include_once '../BLL/bankLogikk.php';

class sjekkLoginnTest extends PHPUnit\Framework\TestCase {
    
    public function testLoginnUgyldigPersonnummer() {
        //arrange
        $personnummer = "1234";
        $passord = "1234";
        $bank = new Bank(new BankDBStub);
        
        //act
        $resultat = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals("Feil i personnummer", $resultat);
        
    }
    
    public function testLoginnUgyldigPassord() {
        //arrange
        $personnummer = "12345678910";
        $passord = "1234";
        $bank = new Bank(new BankDBStub);
        //act
        $resultat = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals("Feil i passord", $resultat);
    }
    
    public function testIkkeEksisterendePersonnummer() {
        $personnummer = "10123456789";
        $passord = "123456";
        $bank = new Bank(new BankDBStub);
        //act
        $resultat = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals("Feil", $resultat);       
    }
    
    public function testFeilPassord() {
        $personnummer = "12345678910";
        $passord = "123456";
        $bank = new Bank(new BankDBStub);
        //act
        $resultat = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals("Feil", $resultat);        
    }
    
    public function testLoginn() {
        $personnummer = "12345678910";
        $passord = "etPassord";
        $bank = new Bank(new BankDBStub);
        //act
        $resultat = $bank->sjekkLoggInn($personnummer, $passord);
        //assert
        $this->assertEquals("OK", $resultat);       
    }
    
}
