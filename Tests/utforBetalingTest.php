<?php

include_once '../Model/domeneModell.php';

include_once '../BLL/bankLogikk.php';

class utforBetalingTest extends PHPUnit\Framework\TestCase {

    public function testUtforBetaling() {
        //arrange
        $bank = new Bank(new BankDBStub());
        //act
        $resultat1 = $bank->utforBetaling(1);
        $resultat2 = $bank->utforBetaling(2);
        $resultat3 = $bank->utforBetaling(3);
        $resultat4 = $bank->utforBetaling("Nei");
        //act
        $this->assertEquals("OK", $resultat1);
        $this->assertEquals("OK", $resultat2);
        $this->assertEquals("Feil", $resultat3);
        $this->assertEquals("Feil", $resultat4);

    }
   

}
