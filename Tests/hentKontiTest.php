<?php
include_once '../Model/domeneModell.php';

include_once '../BLL/bankLogikk.php';

class hentKontiTest extends PHPUnit\Framework\TestCase {
    public function testHentKonti() {
        //arrange
        $personnummer = "12345678910";
        $bank = new Bank(new BankDBStub());
        //act
        $konti = $bank->hentKonti($personnummer);
        //assert
        $this->assertEquals(2, sizeof($konti));
        $this->assertEquals($personnummer, $konti[0]->personnummer);
        $this->assertEquals($personnummer, $konti[1]->personnummer);

    }
    
    
}