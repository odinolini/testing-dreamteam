<?php

include_once '../Model/domeneModell.php';

include_once '../BLL/adminLogikk.php';

include_once '../DAL/adminDatabaseStub.php';

class hentAlleKunderTest extends PHPUnit\Framework\TestCase {
    
    public function testHentAlleKunder() {
        $bank = new Admin(new AdminBankDBStub());
        $kunder = $bank->hentAlleKunder();
        
        $this->assertEquals(3, sizeof($kunder));
        $this->assertEquals("Per", $kunder[0]->fornavn);
        $this->assertEquals("Olsen", $kunder[0]->etternavn);
        $this->assertEquals("01010124344", $kunder[1]->personnummer);
        $this->assertEquals("Line", $kunder[1]->fornavn);
        $this->assertEquals("Ole", $kunder[2]->fornavn);
        $this->assertEquals("Olsen", $kunder[2]->etternavn);
        
    }
}
