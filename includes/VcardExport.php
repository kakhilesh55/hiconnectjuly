<?php
use JeroenDesloovere\VCard\VCard;

class VcardExport
{

    public function contactVcardExportService($contactResult)
    {
        require_once 'includes/vendor/Behat-Transliterator/Transliterator.php';
        require_once 'includes/vendor/jeroendesloovere-vcard/VCard.php';
        // define vcard
        $vcardObj = new VCard();

        // add personal data
        $vcardObj->addName($contactResult["name"]);
        $vcardObj->addEmail($contactResult["email"]);
        $vcardObj->addPhoneNumber($contactResult["phone"]);
        $vcardObj->addPhoneNumber($contactResult["mob1"], 'WORK');
        $vcardObj->addAddress($contactResult["address"]);
        $vcardObj->addCompany($contactResult["company_name"]);
        $vcardObj->addURL($contactResult["website"]);
        $vcardObj->addJobtitle($contactResult["profession"]);
        
        return $vcardObj->download();
    }
}
