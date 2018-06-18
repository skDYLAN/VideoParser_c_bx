<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class ParserDetail extends CBitrixComponent{

    public function handlerArParams(){
        $this->arParams['IBLOCK_ID'] = (int)$this->arParams['IBLOCK_ID'];
        $this->arParams['IBLOCK_COUNT'] = (int)$this->arParams['IBLOCK_COUNT'];
        $this->arParams["IBLOCK_TYPE"] = trim($this->arParams["IBLOCK_TYPE"]);
        if(strlen($this->arParams["IBLOCK_TYPE"])<=0)
            $arParams["IBLOCK_TYPE"] = "movies";

        if(!isset($arParams["CACHE_TIME"]))
            $arParams["CACHE_TIME"] = 36000000;

        $arParams["ELEMENT_ID"] = intval($this->arParams["~ELEMENT_ID"]);
//        if($arParams["ELEMENT_ID"] > 0 && $arParams["ELEMENT_ID"]."" != $arParams["~ELEMENT_ID"])
//        {
//            if (Loader::includeModule("iblock"))
//            {
//                Iblock\Component\Tools::process404(
//                    trim($arParams["MESSAGE_404"]) ?: GetMessage("T_NEWS_DETAIL_NF")
//                    ,true
//                    ,$arParams["SET_STATUS_404"] === "Y"
//                    ,$arParams["SHOW_404"] === "Y"
//                    ,$arParams["FILE_404"]
//                );
//            }
//            return;
//        }
    }

    public function setarResult(){


        $arFilter["ID"] = $this->arParams["ELEMENT_ID"];

        if(intval($this->arParams["IBLOCK_ID"]) > 0)
            $arFilter["IBLOCK_ID"] = $this->arParams["IBLOCK_ID"];


        $arSelect = array_merge($this->arParams["FIELD_CODE"], array(
            "ID",
            "NAME",
            "IBLOCK_ID",
            "IBLOCK_SECTION_ID",
            "DETAIL_TEXT",
            "DETAIL_TEXT_TYPE",
            "PREVIEW_TEXT",
            "PREVIEW_TEXT_TYPE",
            "DETAIL_PICTURE",
            "TIMESTAMP_X",
            "ACTIVE_FROM",
            "LIST_PAGE_URL",
            "DETAIL_PAGE_URL",
            "PROPERTY_VIDEO_ID",
            "PROPERTY_HOSTING",
            "PROPERTY_IFRAME",
            "PROPERTY_IMG_URL",
            "PROPERTY_VIEWS",
            "PROPERTY_REF",
        ));

        $rsElement = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
        if($obElement = $rsElement->GetNextElement()) {
            $this->arResult = $obElement->GetFields();
            global $APPLICATION;

            $APPLICATION->SetTitle($this->arResult["NAME"], "");
        }
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


    }
}

?>