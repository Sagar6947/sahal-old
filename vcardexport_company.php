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
        $vcardObj->addName($contactResult[0]["company_name"]);
        $vcardObj->addBirthday($contactResult[0]["company_tagline"]);
        $vcardObj->addEmail($contactResult[0]["company_email"]);
        $vcardObj->addPhoneNumber($contactResult[0]["company_contact"]);
        $vcardObj->addAddress($contactResult[0]["company_address"]);
        
        return $vcardObj->download();
    }
}
