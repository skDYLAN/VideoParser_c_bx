<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//

$APPLICATION->IncludeComponent(
	"skDYLAN:parser.addForm",
	".default",
	Array(
		"APIKEY_YOUTUBE" => $arParams["YOUTUBE_KEY"],
		"COMPONENT_TEMPLATE" => $arParams["COMPONENT_TEMPLATE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"]
	)
);?><br>

<?$APPLICATION->IncludeComponent(
	"skDYLAN:parser.list",
	".default",
	Array(
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"COMPONENT_TEMPLATE" => $arParams["COMPONENT_TEMPLATE"],
		"IBLOCK_COUNT" => $arParams["IBLOCK_COUNT"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"]
	)
);
?>