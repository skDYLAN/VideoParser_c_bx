<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//



?>

<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
    <?=bitrix_sessid_post()?>
    <input type="text" name="video_url" value="<?=$arResult["VIDEO_URL"]?>">

    <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
    <input type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
</form>