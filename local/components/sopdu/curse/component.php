<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
function SopduPercent($Curse, $Percent){
    if(ctype_digit($Percent) || $Percent !== 0){
        $Summ = ($Curse/100*$Percent)+$Curse;
    } else {
        $Summ = $Curse;
    }
    $data = sprintf("%01.2f", $Summ);
    return $data;
}
include_once ('currency.php');
foreach ($arParams["ChoiceCurrency"] as $Params){
    $arResult[$currency[$Params]["ncode"]] = array(
        "code"      =>  $Params,
        "course"    =>  SopduPercent($currency[$Params]["money"], $arParams["ChoicePercent"]),
        "name"      =>  $currency[$Params]["name"],
        "num_code"  =>  $currency[$Params]["ncode"],
        "unit"      =>  $currency[$Params]["unit"]
    );
}
$this->IncludeComponentTemplate();
?>