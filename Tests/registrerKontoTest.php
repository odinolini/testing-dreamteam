<?php

include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class registrerKontoTest extends PHPUnit\Framework\TestCase {
    public function testRegistrerKonto() {
        //arrange
        $bank = new Admin(new adminBankDBStub);
        $enKonto = new konto();
        $toKonto = new konto();
        
        $enKonto->kontonummer = "111222333444";
        $enKonto->personnummer = "12345678910";
        $enKonto->saldo = 0;
        $enKonto->transaksjoner = [];
        $enKonto->type = "Brukskonto";
        $enKonto->valuta = "NOK";
        //act
        $resultat1 = $bank->registrerKonto($enKonto);
        $resultat2 = $bank->registrerKonto($toKonto);
        //assert
        $this->assertEquals("OK", $resultat1);
        $this->assertEquals("Feil", $resultat2);
    }
}