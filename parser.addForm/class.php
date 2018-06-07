<?php

use \parser\lib\YouTube\YouTubeServiceAd;
use \Parser\Abstr\AbstractServiceAdapter;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

require($_SERVER['DOCUMENT_ROOT']."/local/components/skDYLAN/parser.addForm/lib/YouTube/YouTubeServiceAd.php");

class ParserAddForm extends CBitrixComponent{


    public function handlerArParams(){
        $this->arParams['IBLOCK_ID'] = (int)$this->arParams['IBLOCK_ID'];
        $this->arParams['IBLOCK_COUNT'] = (int)$this->arParams['IBLOCK_COUNT'];
    }

    public function postResult(){

        if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '')
        {

        }
    }


    public function getInfo()
    {
        $serviceAd = AbstractServiceAdapter::getServiceAd("https://www.youtube.com/watch?v=L397TWLwrUU");

        if($serviceAd != null)
        {
           echo $serviceAd->getTitle();

        }
        else
            echo "Видеохостинг не был определен";
        }

    public function executeComponent()
    {

        $this->handlerArParams();
        $this->postResult();

        $this->getInfo();

        $this->includeComponentTemplate();

    }
}

?>