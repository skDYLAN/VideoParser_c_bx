<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//



?>

<table border="1" width="100%" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Video ID</th>
        <th>Видеохостинг</th>
        <th>Название</th>
        <th>Описание</th>
    </tr>
<?foreach ($arResult['ITEMS'] as $arItem):?>

    <tr>
        <td><?= $arItem["ID"]?></td>
        <td></td>
        <td><?= $arItem["PROPERTY_HOSTING_VALUE"]?></td>
        <td><?= $arItem["NAME"]?></td>
        <td><?= $arItem["PREVIEW_TEXT"]?></td>
    </tr>
<?endforeach;?>
</table>