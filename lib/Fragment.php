<?php

namespace Alexplusde\Wsm;

class Fragment extends \rex_fragment
{
    public static function getIframe(string $data_service, string $data_id = "", string $data_params = "", string $data_thumbnail = null)  :string
    {
        $fragment = new self();
        $fragment->setVar("data-service", $data_service);
        $fragment->setVar("data-id", $data_id);
        $fragment->setVar("data-params", $data_params);
        $fragment->setVar("data-thumbnail", $data_thumbnail);
        return $fragment->parse('wsm.iframe.php');
    }
    public static function getJs() :string
    {
        $fragment = new self();
        return $fragment->parse('wsm.js.php');
    }
    public static function getCss() :string
    {
        $fragment = new self();
        return $fragment->parse('wsm.css.php');
    }
        
    public static function getScripts() :string
    {
        $output = "";
        foreach (Service::findScripts() as $script) {
            $fragment = new self;
            $fragment->setVar('category', $script->getValue('group_name'));
            $fragment->setVar('service', $script->getValue('service'));
            $fragment->setVar('script', $script->getValue('script'), false);
            $output.= $fragment->parse("wsm.script.php");
        }
        return $output;
    }
}
