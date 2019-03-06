<?php

include_once '../Model/domeneModell.php';

include_once '../BLL/adminLogikk.php';

include_once '../DAL/adminDatabaseStub.php';

class slettKontoTest extends PHPUnit\Framework\TestCase {
    
    function testSlettKonto() {
        //arrange
        $bank = new admin(new adminBankDBStub());
        $kontoer = $bank->hentAlleKonti();
        $konto1 = $kontoer[0];
        $konto2 = new Konto();
        $konto2->kontonummer = "49584758493";
        //act
        $test1 = $bank->slettKonto($konto1);
        $test2 = $bank->slettKonto($konto2);
        
        //assert
        
        $this->assertEquals("OK", $test1);
        $this->assertEquals("Feil i kontonummer", $test2);
    }
}