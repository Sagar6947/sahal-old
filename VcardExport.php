<?php
use JeroenDesloovere\VCard\VCard;

class VcardExport
{

    public function contactVcardExportService($contactResult)
    {
        require_once 'vendor/Behat-Transliterator/Transliterator.php';
        require_once 'vendor/jeroendesloovere-vcard/VCard.php';
        // define vcard
        $vcardObj = new VCard();

        // add personal data
        $vcardObj->addName($contactResult[0]["emp_name"]);
        $vcardObj->addBirthday($contactResult[0]["date_of_birth"]);
        $vcardObj->addEmail($contactResult[0]["emp_email"]);
        $vcardObj->addPhoneNumber($contactResult[0]["emp_no"]);
        $vcardObj->addAddress($contactResult[0]["emp_address"]);
        
        return $vcardObj->download();
    }
}
