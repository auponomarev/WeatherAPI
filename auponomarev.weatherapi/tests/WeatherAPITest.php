<?php

namespace Tests;

use Auponomarev\Weatherapi\Api\OpenWeatherMap;
use Auponomarev\Weatherapi\Api\YandexWeather;
use Auponomarev\Weatherapi\WeatherAPI;
use Bitrix\Main\Loader;
use PHPUnit\Framework\TestCase;

class WeatherAPITest extends TestCase
{
    public function testWeatherAPI()
    {
        Loader::includeModule('auponomarev.weatherapi');
        
        $weatherAPI = new WeatherAPI();
        $result = $weatherAPI->getWeather(new OpenWeatherMap());
        
        static::assertNotEmpty($result->getName());
        static::assertNotEmpty($result->getWeather());
        static::assertNotEmpty($result->getTemp());
        static::assertNotEmpty($result->getTemp_min());
        static::assertNotEmpty($result->getTemp_max());
        static::assertNotEmpty($result->getFeels_like());
        static::assertNotEmpty($result->getHumidity());
        static::assertNotEmpty($result->getWindspeed());
        static::assertNotEmpty($result->getIcon());
    }
    
    public function testWeatherAPIYandex()
    {
        Loader::includeModule('auponomarev.weatherapi');
        
        $weatherAPI = new WeatherAPI();
        $result = $weatherAPI->getWeather(new YandexWeather());
        
        static::assertNotEmpty($result->getName());
        static::assertNotEmpty($result->getWeather());
        static::assertNotEmpty($result->getTemp());
        static::assertNotEmpty($result->getFeels_like());
        static::assertNotEmpty($result->getHumidity());
        static::assertNotEmpty($result->getWindspeed());
        static::assertNotEmpty($result->getIcon());
    }
}
