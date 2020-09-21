<?php
class myPrice{
    private function getMetallExpPrice($str){
        $exp = explode('<span class="push-data " data-format="maximumFractionDigits:2;minimumFractionDigits:2" data-animation="">', $str);
        $exp = explode('</span>', $exp[1]);
        //$exp = explode('&nbsp;', $exp[0]);
        $exp = str_replace("\xc2\xa0", '', $exp[0]);
        $exp = explode(',', $exp);
        $exp = $exp[0] . '.' . $exp[1];
        return (float)$exp;
    }
    private function getMetallPrice($metall){
        $page = 'https://www.finanz.ru/birzhevyye-tovary/v-realnom-vremeni';
        $array = explode('<tr>', file_get_contents($page));
        switch ($metall) {
            case "Золото":
                $result = $this->getMetallExpPrice($array[2]);
                break;
            case "Палладий":
                $result = $this->getMetallExpPrice($array[3]);
                break;
            case "Серебро":
                $result = $this->getMetallExpPrice($array[5]);
                break;
        }
        return $result;
    }
    private function getCurrency(){
        $json_file = __DIR__.'/daily.json';
        if (!is_file($json_file) || filemtime($json_file) < time() - 3600) {
            if ($json = file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js')) {
                file_put_contents($json_file, $json);
            }
        }
        $result = json_decode(file_get_contents($json_file));
        return [
            "USD"   =>  round($result->Valute->USD->Value, 2),
            "EUR"   =>  round($result->Valute->EUR->Value, 2),
        ];
    }
    private function getSetting(){
        global $DB;
        return $DB->Query("select * from ils_price")->Fetch();
    }
    private function calculation($oz = '', $metall = ''){
        $setting = $this->getSetting();
        if(empty($oz) || empty($metall)){
            $delite = 1;
        }
        if($metall == 'Золото'){
            switch ($oz) {
                case '1':
                    $delite = 1;
                    break;
                case '1/2':
                    $delite = 2;
                    break;
                case '1/4':
                    $delite = 4;
                    break;
                case '1/10':
                    $delite = 10;
                    break;
            }
        } else {
            $delite = 1;
        }
        //$price = $this->getCurrency()["USD"]/$delite;
        // percent
        if(empty($setting["prodaza"])){
            $percentProdaza = 15;
        } else {
            $percentProdaza = $setting["prodaza"];
        }
        if(empty($setting["pokupka"])){
            $percentPokupka = 5;
        } else {
            $percentPokupka = $setting["pokupka"];
        }
        $price = $this->getMetallPrice($metall)/$delite;
        $prodaza = $price/100*$percentProdaza;
        $prodaza = $prodaza+$percentProdaza;
        $pokupka = $price/100*$percentPokupka;
        $pokupka = $pokupka+$percentPokupka;
        return [
            "USD"	=>	[
                "prodaza"   =>  round($prodaza, 2),
                "pokupka"   =>  round($pokupka, 2)
            ],
            "RUB"	=>	[
                "prodaza"   =>  round($prodaza*$this->getCurrency()["USD"], 2),
                "pokupka"   =>  round($pokupka*$this->getCurrency()["USD"], 2)
            ],
            "EUR"	=>	[
                "prodaza"   =>  round(($prodaza*$this->getCurrency()["USD"])/$this->getCurrency()["EUR"], 2),
                "pokupka"   =>  round(($pokupka*$this->getCurrency()["USD"])/$this->getCurrency()["EUR"], 2)
            ]
        ];
    }
    public function main($elementID, $currency){
        if($this->getSetting()["active"] == 'Y') {
            if (empty($currency) || $currency == false) {
                $currency = "RUB";
            }
            $zaprosСoin = CIBlockElement::GetList(
                [],
                [
                    "IBLOCK_ID" => 1,
                    "ID" => $elementID
                ],
                false,
                false,
                ["ID", "IBLOCK_ID", "PROPERTY_METAL", "PROPERTY_WEIGHT_OUNCES"]
            );
            $resultCoin = $zaprosСoin->Fetch();
            $price = $this->calculation(
                $resultCoin["PROPERTY_WEIGHT_OUNCES_VALUE"],
                $resultCoin["PROPERTY_METAL_VALUE"]
            );
            CModule::IncludeModule("catalog");
            CPrice::Update(
                $elementID,
                [
                    "PRODUCT_ID" => $elementID,
                    "CATALOG_GROUP_ID" => 1,
                    "CURRENCY" => $currency,
                    "QUANTITY_FROM" => false,
                    "QUANTITY_TO" => false,
                    "PRICE" => $price[$currency]["prodaza"]
                ]
            );
            CCatalogProduct::Update(
                $elementID,
                [
                    "PURCHASING_PRICE" => $price[$currency]["pokupka"],
                    "PURCHASING_CURRENCY" => $currency
                ]
            );
        }
        return;
    }
}
$myPrice = new myPrice();
?>