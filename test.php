<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Тестовая страница");
?><?$APPLICATION->IncludeComponent("sopdu:curse", "curse_in_header", Array(
	"COMPONENT_TEMPLATE" => ".default",
		"ChoiceCurrency" => array(	// Отображаемая валюта
			0 => "USD",
			1 => "EUR",
		),
		"ChoicePercent" => "",	// Сколько процентов прибавить целое число)
	),
	false
);?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>