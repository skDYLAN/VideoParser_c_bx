<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//

//echo "<pre>".print_r($arResult)."</pre>";
$APPLICATION->IncludeComponent(
	"skDYLAN:parser.detail",
	".default",
	Array(
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => $arParams["COMPONENT_TEMPLATE"],
		"ELEMENT_ID" => $arResult["ALIASES"]["ELEMENT_ID"],
		"FIELD_CODE" => array(0=>"",1=>"",),
		"IBLOCK_COUNT" => "10",
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"PROPERTY_CODE" => array(0=>"",1=>"",)
	)
);
?>


