<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
include_once ('currency.php');
foreach ($currency as $curren){
    $cur[$curren["code"]] = '('.$curren["code"].') '.$curren["unit"].' '.$curren["name"];
}
$arComponentParameters = Array(
    "GROUPS" => Array(
        "ChoiceCurrencySection" => array("NAME" => GetMessage("ChoiceCurrencySection")),
    ),
    "PARAMETERS" => array(
        "ChoiceCurrency" => array(
            "PARENT"            =>  'ChoiceCurrencySection',
            "NAME"              =>  GetMessage("ChoiceCurrency"),
            "REFRESH"           =>  'N',
            "TYPE"              =>  'LIST',
            "VALUES"            =>  $cur,
            "MULTIPLE"          =>  'Y',
            "ADDITIONAL_VALUES" =>  'N',
            "SIZE"              =>  7
        ),
        "ChoicePercent" => array(
            "PARENT"            =>  'ChoiceCurrencySection',
            "NAME"              =>  GetMessage('ChoicePercent'),
            "REFRESH"           =>  'N',
            "TYPE"              =>  'STRING'
        )
    )
);
?>