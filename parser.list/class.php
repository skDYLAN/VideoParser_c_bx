<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class ParserList extends CBitrixComponent{

    public function handlerArParams(){
        $this->arParams['IBLOCK_ID'] = (int)$this->arParams['IBLOCK_ID'];
        $this->arParams['IBLOCK_COUNT'] = (int)$this->arParams['IBLOCK_COUNT'];
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
        $this->setarResult();


        //var_dump($res);

        $this->includeComponentTemplate();

    }
}

?>