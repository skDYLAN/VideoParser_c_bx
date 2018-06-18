<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class ParserList extends CBitrixComponent{

    public function handlerArParams(){
        $this->arParams['IBLOCK_ID'] = (int)$this->arParams['IBLOCK_ID'];
        $this->arParams['IBLOCK_COUNT'] = (int)$this->arParams['IBLOCK_COUNT'];

        if(!isset($arParams["CACHE_TIME"]))
            $arParams["CACHE_TIME"] = 36000000;
    }

    public function setarResult(){
        $arFilter = ['IBLOCK_ID' => $this->arParams['IBLOCK_ID'], 'ACTIVE' => 'Y'];
        $arSelect = ['ID', 'IBLOCK_ID', 'NAME', "PREVIEW_TEXT", "PROPERTY_VIDEO_ID", "PROPERTY_HOSTING", "PROPERTY_IFRAME", "PROPERTY_REF", "PROPERTY_IMG_URL", "PROPERTY_VIEWS"];
        $r = CIBlockElement::GetList(array(), $arFilter,false, false, $arSelect);
        $count = 0;

        while ($res = $r->Fetch()){
            $this->arResult['ITEMS'][] = $res;
        }

        //echo "<pre>".print_r($this->arResult)."</pre>";

    }

    public function executeComponent()
    {
        $this->handlerArParams();
        if(!Bitrix\Main\Loader::includeModule('iblock'))
            return;
        if($this->StartResultCache()) {
            $this->setarResult();
            $this->includeComponentTemplate();
        }

        //var_dump($res);



    }
}

?>