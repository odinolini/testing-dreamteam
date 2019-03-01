<?php

include_once '../Model/domeneModell.php';

include_once '../BLL/bankLogikk.php';

class hentBetalingerTest extends PHPUnit\Framework\TestCase {

    public function testHentBetaling() {
        //arrange
        $enKunde = "12345678910";
        $toKunde = "10123456789";
        $treKunde = "10987654321";
        $bank = new Bank(new BankDBStub());
        //act
        $betalinger1 = $bank->hentBetalinger($enKunde);
        $betalinger2 = $bank->hentBetalinger($toKunde);
        $betalinger3 = $bank->hentBetalinger($treKunde);
        //assert
        $this->assertEquals(2, count($betalinger1));
        $this->assertEquals(1, count($betalinger2));
        $this->assertEquals(0, count($betalinger3));
        
        for ($i = 0; $i < count($betalinger1); $i++) {
            $this->assertEquals(1, $betalinger1[$i]->avventer);
        }
                
    }

}
