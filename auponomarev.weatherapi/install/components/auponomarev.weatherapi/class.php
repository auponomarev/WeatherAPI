<?php
use Auponomarev\Weatherapi\Api\YandexWeather;
use Auponomarev\Weatherapi\WeatherAPI;
use Bitrix\Main\Data\Cache;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}
Loc::loadMessages(__FILE__);
class AuponomarevWeatherApiComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        if (!Loader::includeModule('auponomarev.weatherapi')) {
            new Error(Loc::getMessage('INSTALL_ERROR'));
        }
    
        $cache = Cache::createInstance();
        $cacheId = 'auponomarev.weatherapi';
        $cacheTime = $this->arParams['CACHE_TIME'];
        $cachePath = '/WeatherAPI';
        
        if ($cache->InitCache($cacheTime, $cacheId, $cachePath)) {
            $vars = $cache->GetVars();
            $this->arResult['WeatherAPI'] = $vars['WeatherAPI'];
        } else {
            $weatherAPI = new WeatherAPI();
            $result = $weatherAPI->getWeather(new YandexWeather());
    
            $WeatherAPI = [];
            $WeatherAPI['name'] = $result->getName();
            $WeatherAPI['weather'] = $result->getWeather();
            $WeatherAPI['temp'] = $result->getTemp() > 0 ? "+{$result->getTemp()}" : "-{$result->getTemp()}";
            $WeatherAPI['feels_like'] = $result->getFeels_like();
            $WeatherAPI['humidity'] = $result->getHumidity();
            $WeatherAPI['windspeed'] = $result->getWindspeed();
            $WeatherAPI['iconUrl'] = $result->getIcon();
            $cache->StartDataCache();
            $cache->EndDataCache(['WeatherAPI' => $WeatherAPI]);
            $this->arResult['WeatherAPI'] = $WeatherAPI;
        }
        $this->includeComponentTemplate();
    }
}
