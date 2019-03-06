<?php
include_once '../Model/domeneModell.php';

class adminBankDBStub {

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

}
