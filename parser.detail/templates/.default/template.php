<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//

//echo "<pre>".print_r($arResult)."</pre>";

?>

<h3>Хостинг:</h3>
<p><?= $arResult["PROPERTY_HOSTING_VALUE"]?></p>
<h3>Количество просмотров:</h3>
<p><?= $arResult["PROPERTY_VIEWS_VALUE"]?></p>
<h3>Описание:</h3>
<p><?= $arResult["PREVIEW_TEXT"]?></p>
<h3>ID видео:</h3>
<p><?= $arResult["PROPERTY_VIDEO_ID_VALUE"]?></p>
