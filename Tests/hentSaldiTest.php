<?php
include_once '../Model/domeneModell.php';

include_once '../BLL/bankLogikk.php';

class hentSaldiTest extends PHPUnit\Framework\TestCase {
    public function testHentSaldi() {
        //arrange
        $personnummer = "12345678910";
        $bank = new Bank(new BankDBStub());
        //act
        $saldi = $bank->hentSaldi($personnummer);
        //assert
        $this->assertEquals(3, sizeof($saldi));
        $this->assertEquals(107505, $saldi[0]->saldo);
        $this->assertEquals(5999, $saldi[1]->saldo);
        $this->assertEquals(505.09, $saldi[2]->saldo);
    }
}