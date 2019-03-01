<?php

include_once '../Model/domeneModell.php';

class BankDBStub {

    function hentEnKunde($personnummer) {
        $enKunde = new kunde();
        $enKunde->personnummer = $personnummer;
        $enKunde->navn = "Per Olsen";
        $enKunde->adresse = "Osloveien 82, 0270 Oslo";
        $enKunde->telefonnr = "12345678";
        return $enKunde;
    }

    function hentAlleKunder() {
        $alleKunder = array();
        $kunde1 = new kunde();
        $kunde1->personnummer = "01010122344";
        $kunde1->navn = "Per Olsen";
        $kunde1->adresse = "Osloveien 82 0270 Oslo";
        $kunde1->telefonnr = "12345678";
        $alleKunder[] = $kunde1;
        $kunde2 = new kunde();
        $kunde2->personnummer = "01010122344";
        $kunde2->navn = "Line Jensen";
        $kunde2->adresse = "Askerveien 100, 1379 Asker";
        $kunde2->telefonnr = "92876789";
        $alleKunder[] = $kunde2;
        $kunde3 = new kunde();
        $kunde3->personnummer = "02020233455";
        $kunde3->navn = "Ole Olsen";
        $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
        $kunde3->telefonnr = "99889988";
        $alleKunder[] = $kunde3;
        return $alleKunder;
    }

    function hentTransaksjoner($kontoNr, $fraDato, $tilDato) {
        date_default_timezone_set("Europe/Oslo");
        $fraDato = strtotime($fraDato);
        $tilDato = strtotime($tilDato);
        if ($fraDato > $tilDato) {
            return "Fra dato må være større enn tildato";
        }
        $konto = new konto();
        $konto->personnummer = "010101234567";
        $konto->kontonummer = $kontoNr;
        $konto->type = "Sparekonto";
        $konto->saldo = 2300.34;
        $konto->valuta = "NOK";
        if ($tilDato < strtotime('2015-03-26')) {
            return $konto;
        }
        $dato = $fraDato;
        while ($dato <= $tilDato) {
            switch ($dato) {
                case strtotime('2015-03-26') :
                    $transaksjon1 = new transaksjon();
                    $transaksjon1->dato = '2015-03-26';
                    $transaksjon1->transaksjonBelop = 134.4;
                    $transaksjon1->fraTilKontonummer = "22342344556";
                    $transaksjon1->melding = "Meny Holtet";
                    $konto->transaksjoner[] = $transaksjon1;
                    break;
                case strtotime('2015-03-27') :
                    $transaksjon2 = new transaksjon();
                    $transaksjon2->dato = '2015-03-27';
                    $transaksjon2->transaksjonBelop = -2056.45;
                    $transaksjon2->fraTilKontonummer = "114342344556";
                    $transaksjon2->melding = "Husleie";
                    $konto->transaksjoner[] = $transaksjon2;
                    break;
                case strtotime('2015-03-29') :
                    $transaksjon3 = new transaksjon();
                    $transaksjon3->dato = '2015-03-29';
                    $transaksjon3->transaksjonBelop = 1454.45;
                    $transaksjon3->fraTilKontonummer = "114342344511";
                    $transaksjon3->melding = "Lekeland";
                    $konto->transaksjoner[] = $transaksjon3;
                    break;
            }
            $dato += (60 * 60 * 24); // en dag i tillegg i sekunder
        }
        return $konto;
    }

    function sjekkLoggInn($personnummer, $passord) {
        $enKunde = new kunde();
        $enKunde->personnummer = "12345678910";
        $enKunde->passord = "etPassord";

        $riktigPassordOgPersonnummer = $personnummer == $enKunde->personnummer && $passord == $enKunde->passord;

        if ($riktigPassordOgPersonnummer) {
            return "OK";
        } else {
            return "Feil";
        }
    }

    function hentKonti($personnummer) {
        $enKunde = new kunde();
        $toKunde = new kunde();
        $enKonto = new konto();
        $toKonto = new konto();
        $treKonto = new konto();


        $enKunde->personnummer = "12345678910";
        $toKunde->personnummer = "10123456789";

        $enKonto->personnummer = "12345678910";
        $toKonto->personnummer = "12345678910";
        $treKonto->personnummer = "10123456789";

        $alleKontoer = [$enKonto, $toKonto, $treKonto];
        $konti = [];

        for ($i = 0; $i < sizeof($alleKontoer); $i++) {
            if ($personnummer == $alleKontoer[$i]->personnummer) {
                $konti[$i] = $alleKontoer[$i];
            }
        }

        return $konti;
    }

    function hentSaldi($personnummer) {

        $enKonto = new konto();
        $toKonto = new konto();
        $treKonto = new konto();
        $fireKonto = new konto();

        $enKonto->personnummer = "12345678910";
        $enKonto->saldo = 107505;
        $toKonto->personnummer = "12345678910";
        $toKonto->saldo = 5999;
        $treKonto->personnummer = "12345678910";
        $treKonto->saldo = 505.09;
        $fireKonto->personnummer = "12345612345";
        $fireKonto->saldo = 100;



        $alleKontoer = [$enKonto, $toKonto, $treKonto, $fireKonto];
        $saldi = [];

        for ($i = 0; $i < sizeof($alleKontoer); $i++) {
            if ($personnummer == $alleKontoer[$i]->personnummer) {
                $saldi[$i] = $alleKontoer[$i];
            }
        }

        return $saldi;
    }

    function registrerBetaling($kontoNr, $transaksjon) {
        /*
         * Ikke implementert noen logikk her.
         * Det er ettersom registrerBetaling() i bankDatabase.php ikke inneholder noen form for validering
         * utover om sql-innsetting  var gyldig eller ikke.
         */

        if (isset($kontoNr) && isset($transaksjon)) {
            return "OK";
        }
        return "Feil";
    }

    function hentBetalinger($personnummer) {
        $enKunde = new Kunde();
        $toKunde = new Kunde();
        $treKunde = new Kunde();

        $enKunde->personnummer = "12345678910";
        $toKunde->personnummer = "10123456789";
        $treKunde->personnummer = "10987654321";

        $enKonto = new konto();
        $toKonto = new konto();
        $treKonto = new konto();

        $enKonto->kontonummer = "99999888888";
        $enKonto->personnummer = "12345678910";
        $enKonto->transaksjoner = [];

        $toKonto->kontonummer = "88888777777";
        $toKonto->personnummer = "10123456789";
        $toKonto->tranaksjoner = [];

        $treKonto->kontonummer = "66666555555";
        $treKonto->personnummer = "10987654321";
        $treKonto->transaksjoner = [];

        $transaksjon1 = new transaksjon();
        $transaksjon1->dato = '2015-03-26';
        $transaksjon1->transaksjonBelop = 134.4;
        $transaksjon1->fraTilKontonummer = "22342344556";
        $transaksjon1->melding = "Meny Holtet";
        $transaksjon1->avventer = 1;
        $transaksjon1->txid = 1;
        $enKonto->transaksjoner[] = $transaksjon1;

        $transaksjon2 = new transaksjon();
        $transaksjon2->dato = '2017-03-01';
        $transaksjon2->transaksjonBelop = 9000.9;
        $transaksjon2->fraTilKontonummer = "88888777777";
        $transaksjon2->melding = "Penger";
        $transaksjon2->avventer = 1;
        $transaksjon2->txid = 2;
        $enKonto->transaksjoner[] = $transaksjon2;

        $transaksjon3 = new transaksjon();
        $transaksjon3->dato = '2017-03-01';
        $transaksjon3->transaksjonBelop = 9000.9;
        $transaksjon3->fraTilKontonummer = "88888777777";
        $transaksjon3->melding = "Penger";
        $transaksjon3->avventer = 1;
        $transaksjon3->avventer = 3;
        $toKonto->transaksjoner[] = $transaksjon2;

        $alleKonti = [$enKonto, $toKonto, $treKonto];

        $betalinger = [];
        for ($i = 0; $i < count($alleKonti); $i++) {
            if ($alleKonti[$i]->personnummer == $personnummer) {
                for ($x = 0; $x < count($alleKonti[$i]->transaksjoner); $x++) {
                    $betalinger[] = $alleKonti[$i]->transaksjoner[$x];
                }
            }
        }

        return $betalinger;
    }

    function utforBetaling($txid) {
        $bank = new Bank(new BankDBStub());
        $betalinger = $bank->hentBetalinger("12345678910");

        for ($i = 0; $i < count($betalinger); $i++) {
            if ($betalinger[$i]->txid === $txid) {
                return "OK";
            }
        }
        return "Feil";
    }

    function endreKundeInfo($kunde) {
        if (isset($kunde->adresse) && isset($kunde->etternavn) && isset($kunde->fornavn) && isset($kunde->passord) && isset($kunde->personnummer) && isset($kunde->personnummer) && isset($kunde->postnr) && isset($kunde->poststed) && isset($kunde->telefonnr)) {

            return "OK";
        }
        return "Feil";
    }

    function hentKundeInfo($personnummer) {
        $enKunde = new kunde();
        $toKunde = new kunde();

        $enKunde->adresse = "Veiens vei";
        $enKunde->etternavn = "Nordmann";
        $enKunde->fornavn = "Ola";
        $enKunde->passord = "hunter2";
        $enKunde->personnummer = "12345678910";
        $enKunde->postnr = "1234";
        $enKunde->poststed = "Sted";
        $enKunde->telefonnr = "12345678";

        $toKunde->adresse = "By alle";
        $toKunde->etternavn = "Nordmann";
        $toKunde->fornavn = "Kari";
        $toKunde->passord = "********";
        $toKunde->personnummer = "10123456789";
        $toKunde->postnr = "1234";
        $toKunde->poststed = "Sted";
        $toKunde->telefonnr = "87654321";
        
        if ($personnummer === "12345678910") {
            return $enKunde;
        } else if ($personnummer === "10123456789") {
            return $toKunde;
        }
        
        return "Feil";
    }

}
