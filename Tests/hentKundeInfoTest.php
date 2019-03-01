<?php

include_once '../Model/domeneModell.php';

include_once '../BLL/bankLogikk.php';

class hentKundeInfoTest extends PHPUnit\Framework\TestCase {

    public function testHentKundeInfo() {
        //Arrange
        $bank = new Bank(new BankDBStub());
        //act
        $resultat1 = $bank->hentKundeInfo("12345678910");
        $resultat2 = $bank->hentKundeInfo("10123456789");
        $resultat3 = $bank->hentKundeInfo("99999555555");
        //assert
        $this->assertEquals("Veiens vei", $resultat1->adresse);
        $this->assertEquals("Nordmann", $resultat1->etternavn);
        $this->assertEquals("Ola", $resultat1->fornavn);
        $this->assertEquals("hunter2", $resultat1->passord);
        $this->assertEquals("1234", $resultat1->postnr);
        $this->assertEquals("Sted", $resultat1->poststed);
        $this->assertEquals("12345678", $resultat1->telefonnr);
        
        $this->assertEquals("Feil", $resultat3);
    }

}
