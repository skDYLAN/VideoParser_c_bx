<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arCurrentValues */


if(!CModule::IncludeModule("iblock"))
    return;

$arTypesEx = CIBlockParameters::GetIBlockTypes(array("-"=>" "));

$arIBlocks=array();
$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!= "-" ? $arCurrentValues["IBLOCK_TYPE"] : "")));
while($arRes = $db_iblock->Fetch())
    $arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];

$arComponentParameters = array(
    "GROUPS" => array(
    ),
    "PARAMETERS" => array(
        "IBLOCK_TYPE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_LIST_TYPE"),
            "TYPE" => "LIST",
            "VALUES" => $arTypesEx,
            "DEFAULT" => "pars_movies",
            "REFRESH" => "Y",
        ),
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_DESC_LIST_ID"),
            "TYPE" => "LIST",
            "VALUES" => $arIBlocks,
            "DEFAULT" => '',
            "ADDITIONAL_VALUES" => "Y",
            "REFRESH" => "Y",
        ),
        "ELEMENT_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("CP_BND_ELEMENT_ID"),
            "TYPE" => "STRING",
            "DEFAULT" => '={$_REQUEST["ELEMENT_ID"]}',
        ),
        "IBLOCK_COUNT" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_COUNT"),
            "DEFAULT" => "10",
        ),
        "CHECK_DATES" => array(
            "PARENT" => "DATA_SOURCE",
            "NAME" => GetMessage("T_IBLOCK_DESC_CHECK_DATES"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
        ),
        "FIELD_CODE" => CIBlockParameters::GetFieldCode(GetMessage("IBLOCK_FIELD"), "DATA_SOURCE"),
        "PROPERTY_CODE" => array(
            "PARENT" => "DATA_SOURCE",
            "NAME" => GetMessage("T_IBLOCK_PROPERTY"),
            "TYPE" => "LIST",
            "MULTIPLE" => "Y",
            "VALUES" => $arProperty_LNS,
            "ADDITIONAL_VALUES" => "Y",
        ),
        "CACHE_TIME" => Array("DEFAULT"=>360000),
    ),
);
?>
