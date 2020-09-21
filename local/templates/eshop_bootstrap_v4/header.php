<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx"));

\Bitrix\Main\UI\Extension::load("ui.bootstrap4");

if (isset($_GET["theme"]) && in_array($_GET["theme"], array("blue", "green", "yellow", "red")))
{
	COption::SetOptionString("main", "wizard_eshop_bootstrap_theme_id", $_GET["theme"], false, SITE_ID);
}
$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "green", SITE_ID);

$curPage = $APPLICATION->GetCurPage(true);

?><!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
    <meta name="yandex-verification" content="c9c68179e1a55f56" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_DIR?>favicon.ico" />
	<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/src/owl.carousel.min.css">
	<? $APPLICATION->ShowHead(); ?>
</head>
<body class="bx-background-image bx-theme-<?=$theme?>" <?$APPLICATION->ShowProperty("backgroundImage");?>>
<style>
   /* #bx-soa-region {display: none}*/
</style>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<?$APPLICATION->IncludeComponent(
	"bitrix:eshop.banner",
	"",
	array()
);?>
<div class="bx-wrapper" id="bx_eshop_wrap">
	<header class="bx-header">

		<div class="bx-header-section">
			<!--region bx-header-->
			<div class="pt-0 pt-md-3 mb-3 align-items-center" style="position: relative;">
				<div class="d-block d-md-none bx-menu-button-mobile" data-role='bx-menu-button-mobile-position'></div>
				<div class="col-12 col-md-auto bx-header-logo">
					
					<a class="bx-logo-block d-block d-md-none text-center" href="<?=SITE_DIR?>">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => SITE_DIR."include/company_logo_mobile.php"
							),
							false
						);?>
					</a>
				</div>

				

				<div class="col bx-header-contact">
					<div class="container d-flex justify-content-between">
						<div class="d-flex align-items-center justify-content-center flex-column flex-sm-row flex-md-column flex-lg-row">
							<?$APPLICATION->IncludeComponent(
								"sopdu:curse", 
								"curse_in_header", 
								array(
									"COMPONENT_TEMPLATE" => "curse_in_header",
									"ChoiceCurrency" => array(
										0 => "USD",
										1 => "EUR",
									),
									"ChoicePercent" => ""
								),
								false
							);?>
						</div>

						<div class="header-contacts">
							<div class="contact-wrap">
								<div class="contact-icon time"></div>
								<span class="contact-text">Время работы: Пн-Вс 10-19</span>
							</div>
						
							<div class="contact-wrap">
								<div class="contact-icon mail"></div>
								<a href="mailto:info@zoloto-invest.com" class="contact-link"><span class="contact-text">info@zoloto-invest.com</span></a>
							</div>
																			
							<div class="contact-wrap">
								<div class="contact-icon call"></div>
								<a href="tel:74950000000" class="contact-link"><span class="contact-text">8 (495) 000 00 00</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--endregion-->

			<!--region menu-->
			<div class="d-none d-md-block">
				<div class="col">
					<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"bootstrap_v4", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_THEME" => "site",
		"CACHE_SELECTED_ITEMS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "4",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "bootstrap_v4"
	),
	false
);?>
				</div>
			</div>
			<!--endregion-->
            <?if ($curPage == SITE_DIR."index.php"):?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "slider",
                Array(
                    "IBLOCK_ID" => "4",
                    "IBLOCK_TYPE" => "information",
                    "PROPERTY_CODE" => array("BUTTON_LINK", "BUTTON_TEXT", ""),
                )
            );?>
            <?endif;?>

			<!--region search.title -->
			<?if ($curPage != SITE_DIR."index.php"):?>
                <?/*
				<div class="row mb-4">
					<div class="col">
						<?$APPLICATION->IncludeComponent(
							"bitrix:search.title",
							"bootstrap_v4",
							array(
								"NUM_CATEGORIES" => "1",
								"TOP_COUNT" => "5",
								"CHECK_DATES" => "N",
								"SHOW_OTHERS" => "N",
								"PAGE" => SITE_DIR."catalog/",
								"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS") ,
								"CATEGORY_0" => array(
									0 => "iblock_catalog",
								),
								"CATEGORY_0_iblock_catalog" => array(
									0 => "all",
								),
								"CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
								"SHOW_INPUT" => "Y",
								"INPUT_ID" => "title-search-input",
								"CONTAINER_ID" => "search",
								"PRICE_CODE" => array(
									0 => "BASE",
								),
								"SHOW_PREVIEW" => "Y",
								"PREVIEW_WIDTH" => "75",
								"PREVIEW_HEIGHT" => "75",
								"CONVERT_CURRENCY" => "Y"
							),
							false
						);?>
					</div>
				</div>
                */?>
            <br />
			<?endif?>
			<!--endregion-->

			<!--region breadcrumb-->

			<!--endregion-->
		</div>
	</header>



	


	<div class="workarea">
		<div class="container bx-content-section">
			<div class="row">
			<?$needSidebar = preg_match("~^".SITE_DIR."(catalog|personal\/cart|personal\/order\/make)/~", $curPage);?>
				<?/*<div class="bx-content <?=($needSidebar ? "col" : "col-md-9 col-sm-8")?>">*/?>
				<div class="bx-content col-md-12 col-sm-12">
                    <?if ($curPage != SITE_DIR."index.php"):?>
                    <div class="row mb-4">
                        <div class="col" id="navigation">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:breadcrumb",
                                "universal",
                                array(
                                    "START_FROM" => "0",
                                    "PATH" => "",
                                    "SITE_ID" => "-"
                                ),
                                false,
                                Array('HIDE_ICONS' => 'Y')
                            );?>
                        </div>
                    </div>
                    <?/*<h1 id="pagetitle"><?$APPLICATION->ShowTitle(false);?></h1>*/?>
<?endif?>