<?php

include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class registrerKundeTest extends PHPUnit\Framework\TestCase {
    public function testRegistrerKunde() {
        //arrange
        $bank = new Admin(new adminBankDBStub());
        $enKunde = new Kunde();
        $toKunde = new Kunde();
        
        $enKunde->adresse = "Laksveien 6b";
        $enKunde->etternavn = "Laksesen";
        $enKunde->fornavn = "Fisk";
        $enKunde->passord = "hunter2";
        $enKunde->personnummer = "12345678910";
        $enKunde->postnr = "1234";
        $enKunde->poststed = "Lakselv";
        $enKunde->telefonnr = "12345678";
        
        //act
        $resultat1 = $bank->registrerKunde($enKunde);
        $resultat2 = $bank->registrerKunde($toKunde);
        
        //assert
        $this->assertEquals("OK", $resultat1);
        $this->assertEquals("Feil", $resultat2);
    }
}