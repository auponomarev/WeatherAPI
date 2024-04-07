<?php

use Bitrix\Main\Localization\Loc;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) {
    die();
}

Loc::loadMessages(__FILE__);
$arComponentDescription = [
    'NAME' => Loc::getMessage('auponomarev.weatherapi_NAME'),
    'DESCRIPTION' => Loc::getMessage('auponomarev.weatherapi_DESCRIPTION'),
    'PATH' => [
        'ID' => 'weatherapi',
        'NAME' => Loc::getMessage('auponomarev.weatherapi_COMPONENT_DESC')
    ]
];
