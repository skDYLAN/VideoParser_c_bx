<?php

use \parser\lib\YouTube\YouTubeServiceAd;
use \Parser\Abstr\AbstractServiceAdapter;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

require($_SERVER['DOCUMENT_ROOT']."/local/components/skDYLAN/parser.addForm/lib/YouTube/YouTubeServiceAd.php");

class ParserAddForm extends CBitrixComponent{

    protected $serviceAd;

    public function handlerArParams(){
        $this->arParams['IBLOCK_ID'] = (int)$this->arParams['IBLOCK_ID'];
        $this->arParams['IBLOCK_COUNT'] = (int)$this->arParams['IBLOCK_COUNT'];
    }

    function postResult(){

        if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '')
        {
            $this->getInfo(trim($_POST["video_url"]));

            if($this->serviceAd->initFlag == true)
                $this->addInfo();
            else
                echo "Ошибка при инициалацизации объекта ";
        }
    }


    function getInfo($url)
    {
        $stdParams = new \Parser\Abstr\stdParams();
        $stdParams->ApiKey_YouTube = $this->arParams["APIKEY_YOUTUBE"];
        $stdParams->url = $url;

        $this->serviceAd = AbstractServiceAdapter::getServiceAd($stdParams);


        if($this->serviceAd == null) {
            echo "Видеохостинг не был определен";
            return;
        }


    }

    function addInfo(){
        $el = new CIBlockElement;

        $props = array(
            "VIDEO_ID" => $this->serviceAd->getVideoId(),
            "VIEWS" => $this->serviceAd->getViewCount(),
            "HOSTING" =>  $this->serviceAd->getServiceName(),
        );

        $arLoadProductArray = Array(
            //"MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
            "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
            "IBLOCK_ID"      => $this->arParams['IBLOCK_ID'],
            "PROPERTY_VALUES"   => $props,
            "NAME"           => $this->serviceAd->getTitle(),
            "ACTIVE"         => "Y",            // активен
            "PREVIEW_TEXT"   => $this->serviceAd->getDescription(),
            //"DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/image.gif)
        );

        if($PRODUCT_ID = $el->Add($arLoadProductArray))
            echo "New ID: ".$PRODUCT_ID;
        else
            echo "Error: ".$el->LAST_ERROR;
    }

    public function executeComponent()
    {
        $this->handlerArParams();
        $this->postResult();


        $this->includeComponentTemplate();

    }
}

?>