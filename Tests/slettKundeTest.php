<?php

include_once '../Model/domeneModell.php';

include_once '../BLL/adminLogikk.php';

include_once '../DAL/adminDatabaseStub.php';

class slettKundeTest extends PHPUnit\Framework\TestCase {
    
    function testSlettKunde() {
        $bank = new Admin(new adminBankDBStub());
        
        $test1 = $bank->slettKunde("123");
        $test2 = $bank->slettKunde("02020233455");
        
        $this->assertEquals("Feil", $test1);
        $this->assertEquals("OK", $test2);        
        
    }
}