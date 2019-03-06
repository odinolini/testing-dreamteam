<?php

include_once '../Model/domeneModell.php';
include_once '../BLL/adminLogikk.php';
include_once '../DAL/adminDatabaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentAlleKontiTest extends PHPUnit\Framework\TestCase {

    public function testHentAlleKonti() {
        //arrange
        $bank = new Admin(new adminBankDBStub());
        //act
        $resultat = $bank->hentAlleKonti();
        //assert
        $this->assertEquals(3, count($resultat));
        $this->assertEquals("12345678910", $resultat[0]->kontonummer);
        $this->assertEquals(553.5, $resultat[1]->saldo);
    }

}
