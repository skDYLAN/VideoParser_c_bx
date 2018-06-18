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
            "PARAM_OF_PARSER" => array(
                "NAME" => GetMessage("PARAM_OF_PARSER_GROUP_NAME"),
            ),
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
        "IBLOCK_COUNT" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("T_IBLOCK_COUNT"),
            "DEFAULT" => "10",
        ),

        "YOUTUBE_KEY" => array(
            "PARENT" => "PARAM_OF_PARSER",
            "NAME" => GetMessage("YOUTUBE_KEY"),
            ),
        "SEF_MODE" => Array(
            "news" => array(
                "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS"),
                "DEFAULT" => "",
                "VARIABLES" => array(),
            ),
            "section" => array(
                "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS_SECTION"),
                "DEFAULT" => "",
                "VARIABLES" => array("SECTION_ID"),
            ),
            "detail" => array(
                "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_NEWS_DETAIL"),
                "DEFAULT" => "#ELEMENT_ID#/",
                "VARIABLES" => array("ELEMENT_ID", "SECTION_ID"),
            ),
            "search" => array(
                "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_SEARCH"),
                "DEFAULT" => "search/",
                "VARIABLES" => array(),
            ),
            "rss" => array(
                "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_RSS"),
                "DEFAULT" => "rss/",
                "VARIABLES" => array(),
            ),
            "rss_section" => array(
                "NAME" => GetMessage("T_IBLOCK_SEF_PAGE_RSS_SECTION"),
                "DEFAULT" => "#SECTION_ID#/rss/",
                "VARIABLES" => array("SECTION_ID"),
            ),
        ),
        "CACHE_TIME" => Array("DEFAULT"=>360000),
    ),
);
?>
