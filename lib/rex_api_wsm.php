<?php

class rex_api_wsm extends rex_api_function
{
    protected $published = true;

    public function execute()
    {
        // Parameter abrufen und auswerten
        $consent = rex_request('action', 'string');
        $hash = rex_request('hash', 'string');

        $dataset = [];
        if ($consent == "sendConsent") {
            $dataset = wsm_protocol::query()->Where("hash", $hash)->findOne();

            if (!$dataset) {
                $dataset = wsm_protocol::create();
            }

            $dataset
            ->setValue('hash', $hash)
            ->setValue('consentdate', "")
            ->setValue('cookies', "")
            ->save();
        }

        // Artikel senden
        header('Content-Type: text/html; charset=UTF-8');
        dump($dataset);
        exit();
    }
}
