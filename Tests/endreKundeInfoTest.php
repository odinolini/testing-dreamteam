<?php

include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class endreKundeInfoTest extends PHPUnit\Framework\TestCase {

    public function testEndreKundeInfo() {
        //Arrange
        $bank = new Bank(new BankDBStub());
        $kunde = new kunde();
        
        $kunde2 = new kunde();
        
        $kunde->adresse = "Veiens vei";
        $kunde->etternavn = "Nordmann";
        $kunde->fornavn = "Ola";
        $kunde->passord = "hunter2";
        $kunde->personnummer = "12345678910";
        $kunde->postnr = "1234";
        $kunde->poststed = "Sted";
        $kunde->telefonnr = "12345678";
        //act
        $resultat1 = $bank->endreKundeInfo($kunde);
        $resultat2 = $bank->endreKundeInfo($kunde2);
        //assert
        $this->assertEquals("OK", $resultat1);
        $this->assertEquals("Feil", $resultat2);
    }
    
    public function testEndreKundeInfoAdmin() {
        $bank = new Admin(new adminBankDBStub());
        $kunde = new kunde();
        
        $kunde2 = new kunde();
        
        $kunde->adresse = "Veiens vei";
        $kunde->etternavn = "Nordmann";
        $kunde->fornavn = "Ola";
        $kunde->passord = "hunter2";
        $kunde->personnummer = "12345678910";
        $kunde->postnr = "1234";
        $kunde->poststed = "Sted";
        $kunde->telefonnr = "12345678";
        //act
        $resultat1 = $bank->endreKundeInfo($kunde);
        $resultat2 = $bank->endreKundeInfo($kunde2);
        //assert
        $this->assertEquals("OK", $resultat1);
        $this->assertEquals("Feil", $resultat2);
    }

}
