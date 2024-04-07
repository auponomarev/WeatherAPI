<?php

declare(strict_types=1);

namespace Auponomarev\Weatherapi;

use Auponomarev\Weatherapi\Api\Request;
use Bitrix\Main\Config\Option;

/**
 * Виджет погоды
 */
class WeatherAPI
{
    
    public function __construct(
    ) {
    }
    
    public function getWeather(Request $request): Fields
    {
        $lat = Option::get('auponomarev.weatherapi', 'lat', '');
        $lon = Option::get('auponomarev.weatherapi', 'lon', '');
        $lang = Option::get('auponomarev.weatherapi', 'lang', '');
        $api_key = Option::get('auponomarev.weatherapi', 'api_key', '');
        
        return $request->getRequest(lat: $lat, lon:$lon, lang: $lang, api_key:$api_key);
    }
}
