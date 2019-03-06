<?php

include_once '../Model/domeneModell.php';

class adminBankDBStub {

    function hentAlleKunder() {
        $alleKunder = array();
        $kunde1 = new kunde();
        $kunde1->personnummer = "01010122344";
        $kunde1->fornavn = "Per";
        $kunde1->etternavn = "Olsen";
        $kunde1->adresse = "Osloveien 82 0270 Oslo";
        $kunde1->telefonnr = "12345678";
        $alleKunder[] = $kunde1;
        $kunde2 = new kunde();
        $kunde2->personnummer = "01010124344";
        $kunde2->fornavn = "Line";
        $kunde2->etternavn = "Jensen";
        $kunde2->adresse = "Askerveien 100, 1379 Asker";
        $kunde2->telefonnr = "92876789";
        $alleKunder[] = $kunde2;
        $kunde3 = new kunde();
        $kunde3->personnummer = "02020233455";
        $kunde3->fornavn = "Ole";
        $kunde3->etternavn = "Olsen";
        $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
        $kunde3->telefonnr = "99889988";
        $alleKunder[] = $kunde3;
        return $alleKunder;
    }

    function endreKundeInfo($kunde) {
        if (isset($kunde->adresse) && isset($kunde->etternavn) && isset($kunde->fornavn) && isset($kunde->passord) && isset($kunde->personnummer) && isset($kunde->personnummer) && isset($kunde->postnr) && isset($kunde->poststed) && isset($kunde->telefonnr)) {

            return "OK";
        }
        return "Feil";
    }

    function registrerKunde($kunde) {
        if (isset($kunde->adresse) && isset($kunde->etternavn) && isset($kunde->fornavn) && isset($kunde->passord) && isset($kunde->personnummer) && isset($kunde->personnummer) && isset($kunde->postnr) && isset($kunde->poststed) && isset($kunde->telefonnr)) {

            return "OK";
        }
        return "Feil";
    }

    function registerKonto($konto) {


        if (isset($konto->kontonummer) && isset($konto->personnummer) && isset($konto->saldo) && isset($konto->transaksjoner) && isset($konto->type) && isset($konto->valuta)) {
            return "OK";
        }
        return "Feil";
    }

    function endreKonto($konto) {
        $alleKunder = $this->hentAlleKunder();

        $erGyldigPersonNummer = false;
        for ($i = 0; $i < count($alleKunder); $i++) {
            if ($konto->personnummer == $alleKunder[$i]->personnummer) {
                $erGyldigPersonNummer = true;
            }
        }

        if (!$erGyldigPersonNummer) {
            return "Feil i personnummer";
        }
        return "OK";
    }

    function hentAlleKonti() {
        $konto1 = new konto();
        $konto2 = new konto();
        $konto3 = new konto();
        
        $konto1->kontonummer = "12345678910";
        $konto2->saldo = 553.5;
        
        $alleKonti = [$konto1, $konto2, $konto3];
        
        return $alleKonti;
    }

}
