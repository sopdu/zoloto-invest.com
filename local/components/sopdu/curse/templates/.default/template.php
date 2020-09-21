<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>111
<?foreach ($arResult as $item):?>
    <?if($item["code"] == 'USD'):?>
        <img src="<?=$this->GetFolder()?>/img/usmp.png" alt="<?=$item["code"]?>"> <?=$item["course"]?> <?=GetMessage("SOPDU_CURSE_RUB")?><br />
    <?elseif ($item["code"] == 'EUR'):?>
        <img src="<?=$this->GetFolder()?>/img/eu.png" alt="<?=$item["code"]?>"> <?=$item["course"]?> <?=GetMessage("SOPDU_CURSE_RUB")?><br />
    <?else:?>
    <?=$item["code"]?>: <?=$item["course"]?> <?=GetMessage("SOPDU_CURSE_RUB")?><br />
    <?endif;?>
<?endforeach;?>

