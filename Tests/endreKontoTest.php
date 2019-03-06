<?php

include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class endreKontoTest extends PHPUnit\Framework\TestCase {

    public function testEndreKonto() {
        //arrange
        $bank = new Admin(new adminBankDBStub());
        $enKonto = new konto();
        $toKonto = new konto();
        $enKonto->personnummer = "01010122344";
        $toKonto->personnummer = "123";
        
        //act
        $resultat1 = $bank->endreKonto($enKonto);
        $resultat2 = $bank->endreKonto($toKonto);
        
        //assert
        $this->assertEquals("OK", $resultat1);
        $this->assertEquals("Feil i personnummer", $resultat2);
    }

}
