<?php
function SopduCurseZapros() {
    $json_file = __DIR__.'/daily.json';
    if (!is_file($json_file) || filemtime($json_file) < time() - 3600) {
        if ($json = file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js')) {
            file_put_contents($json_file, $json);
        }
    }
    return json_decode(file_get_contents($json_file));
}
$currency = array(
    'AUD' => array(
        "ncode" =>  036,
        "code"  =>  'AUD',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_AVSTRALIYSKIY_DOLLAR"),
        "money" =>  SopduCurseZapros()->Valute->AUD->Value
    ),
    'AZN' => array(
        "ncode" =>  044,
        "code"  =>  'AZN',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_AZERBAYDJANSKIY_MANA"),
        "money" =>  SopduCurseZapros()->Valute->AZN->Value
    ),
    'GBP' => array(
        "ncode" =>  826,
        "code"  =>  'GBP',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_FUNT_STERLINGOV_SOED"),
        "money" =>  SopduCurseZapros()->Valute->GBP->Value
    ),
    'AMD' =>  array(
        "ncode" =>  051,
        "code"  =>  'AMD',
        "unit"  =>  100,
        "name"  =>  GetMessage("SOPDU_CURSE_ARMANSKIH_DRAMOV"),
        "money" =>  SopduCurseZapros()->Valute->AMD->Value
    ),
    'BYN' => array(
        "ncode" =>  933,
        "code"  =>  'BYN',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_BELORUSSKIY_RUBLQ"),
        "money" =>  SopduCurseZapros()->Valute->BYN->Value
    ),
    'BGN' => array(
        "ncode" =>  975,
        "code"  =>  'BGN',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_BOLGARSKIY_LEV"),
        "money" =>  SopduCurseZapros()->Valute->BGN->Value
    ),
    'BRL' => array(
        "ncode" =>  986,
        "code"  =>  'BRL',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_BRAZILQSKIY_REAL"),
        "money" =>  SopduCurseZapros()->Valute->BRL->Value
    ),
    'HUF' => array(
        "ncode" =>  348,
        "code"  =>  'HUF',
        "unit"  =>  100,
        "name"  =>  GetMessage("SOPDU_CURSE_VENGERSKIH_FORINTOV"),
        "money" =>  SopduCurseZapros()->Valute->HUF->Value
    ),
    'HKD' => array(
        "ncode" =>  344,
        "code"  =>  'HKD',
        "unit"  =>  10,
        "name"  =>  GetMessage("SOPDU_CURSE_GONKONGSKIH_DOLLAROV"),
        "money" =>  SopduCurseZapros()->Valute->HKD->Value
    ),
    'DKK' => array(
        "ncode" =>  208,
        "code"  =>  'DKK',
        "unit"  =>  10,
        "name"  =>  GetMessage("SOPDU_CURSE_DATSKIH_KRON"),
        "money" =>  SopduCurseZapros()->Valute->DKK->Value
    ),
    'USD' => array(
        "ncode" =>  840,
        "code"  =>  'USD',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_DOLLAR_SSA"),
        "money" =>  SopduCurseZapros()->Valute->USD->Value
    ),
    'EUR' => array(
        "ncode" =>  978,
        "code"  =>  'EUR',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_EVRO"),
        "money" =>  SopduCurseZapros()->Valute->EUR->Value
    ),
    'INR' => array(
        "ncode" =>  356,
        "code"  =>  'INR',
        "unit"  =>  100,
        "name"  =>  GetMessage("SOPDU_CURSE_INDIYSKIH_RUPIY"),
        "money" =>  SopduCurseZapros()->Valute->INR->Value
    ),
    'KZT' => array(
        "ncode" =>  398,
        "code"  =>  'KZT',
        "unit"  =>  100,
        "name"  =>  GetMessage("SOPDU_CURSE_KAZAHSTANSKIH_TENGE"),
        "money" =>  SopduCurseZapros()->Valute->KZT->Value
    ),
    'CAD' => array(
        "ncode" =>  124,
        "code"  =>  'CAD',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_KANADSKIY_DOLLAR"),
        "money" =>  SopduCurseZapros()->Valute->CAD->Value
    ),
    'KGS' => array(
        "ncode" =>  417,
        "code"  =>  'KGS',
        "unit"  =>  100,
        "name"  =>  GetMessage("SOPDU_CURSE_KIRGIZSKIH_SOMOV"),
        "money" =>  SopduCurseZapros()->Valute->KGS->Value
    ),
    'CNY' => array(
        "ncode" =>  156,
        "code"  =>  'CNY',
        "unit"  =>  10,
        "name"  =>  GetMessage("SOPDU_CURSE_KITAYSKIH_UANEY"),
        "money" =>  SopduCurseZapros()->Valute->CNY->Value
    ),
    'MDL' => array(
        "ncode" =>  498,
        "code"  =>  'MDL',
        "unit"  =>  10,
        "name"  =>  GetMessage("SOPDU_CURSE_MOLDAVSKIH_LEEV"),
        "money" =>  SopduCurseZapros()->Valute->MDL->Value
    ),
    'NOK' => array(
        "ncode" =>  578,
        "code"  =>  'NOK',
        "unit"  =>  10,
        "name"  =>  GetMessage("SOPDU_CURSE_NORVEJSKIH_KRON"),
        "money" =>  SopduCurseZapros()->Valute->NOK->Value
    ),
    'PLN' => array(
        "ncode" =>  985,
        "code"  =>  'PLN',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_POLQSKIY_ZLOTYY"),
        "money" =>  SopduCurseZapros()->Valute->PLN->Value
    ),
    'RON' => array(
        "ncode" =>  946,
        "code"  =>  'RON',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_RUMYNSKIY_LEY"),
        "money" =>  SopduCurseZapros()->Valute->RON->Value
    ),
    'XDR' => array(
        "ncode" =>  960,
        "code"  =>  'XDR',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_SDR"),
        "money" =>  SopduCurseZapros()->Valute->XDR->Value
    ),
    'SGD' => array(
        "ncode" =>  702,
        "code"  =>  'SGD',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_SINGAPURSKIY_DOLLAR"),
        "money" =>  SopduCurseZapros()->Valute->SGD->Value
    ),
    'TJS' => array(
        "ncode" =>  972,
        "code"  =>  'TJS',
        "unit"  =>  10,
        "name"  =>  GetMessage("SOPDU_CURSE_TADJIKSKIH_SOMONI"),
        "money" =>  SopduCurseZapros()->Valute->TJS->Value
    ),
    'TRY' =>  array(
        "ncode" =>  949,
        "code"  =>  'TRY',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_TURECKAA_LIRA"),
        "money" =>  SopduCurseZapros()->Valute->TRY->Value
    ),
    'TMT' => array(
        "ncode" =>  934,
        "code"  =>  'TMT',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_NOVYY_TURKMENSKIY_MA"),
        "money" =>  SopduCurseZapros()->Valute->TMT->Value
    ),
    'UZS' => array(
        "ncode" =>  860,
        "code"  =>  'UZS',
        "unit"  =>  10000,
        "name"  =>  GetMessage("SOPDU_CURSE_UZBEKSKIH_SUMOV"),
        "money" =>  SopduCurseZapros()->Valute->UZS->Value
    ),
    'UAH' => array(
        "ncode" =>  980,
        "code"  =>  'UAH',
        "unit"  =>  10,
        "name"  =>  GetMessage("SOPDU_CURSE_UKRAINSKIH_GRIVEN"),
        "money" =>  SopduCurseZapros()->Valute->UAH->Value
    ),
    'CZK' => array(
        "ncode" =>  203,
        "code"  =>  'CZK',
        "unit"  =>  10,
        "name"  =>  GetMessage("SOPDU_CURSE_CESSKIH_KRON"),
        "money" =>  SopduCurseZapros()->Valute->CZK->Value
    ),
    'SEK' => array(
        "ncode" =>  752,
        "code"  =>  'SEK',
        "unit"  =>  10,
        "name"  =>  GetMessage("SOPDU_CURSE_SVEDSKIH_KRON"),
        "money" =>  SopduCurseZapros()->Valute->SEK->Value
    ),
    'CHF' => array(
        "ncode" =>  756,
        "code"  =>  'CHF',
        "unit"  =>  1,
        "name"  =>  GetMessage("SOPDU_CURSE_SVEYCARSKIY_FRANK"),
        "money" =>  SopduCurseZapros()->Valute->CHF->Value
    ),
    'ZAR' => array(
        "ncode" =>  710,
        "code"  =>  'ZAR',
        "unit"  =>  10,
        "name"  =>  GetMessage("SOPDU_CURSE_UJNOAFRIKANSKIH_REND"),
        "money" =>  SopduCurseZapros()->Valute->ZAR->Value
    ),
    'KRW' => array(
        "ncode" =>  410,
        "code"  =>  'KRW',
        "unit"  =>  1000,
        "name"  =>  GetMessage("SOPDU_CURSE_VON_RESPUBLIKI_KOREA"),
        "money" =>  SopduCurseZapros()->Valute->KRW->Value
    ),
    'JPY' => array(
        "ncode" =>  392,
        "code"  =>  'JPY',
        "unit"  =>  100,
        "name"  =>  GetMessage("SOPDU_CURSE_APONSKIH_IEN"),
        "money" =>  SopduCurseZapros()->Valute->JPY->Value
    )
);
?>
