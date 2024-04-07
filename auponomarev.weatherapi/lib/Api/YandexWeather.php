<?php

namespace Auponomarev\Weatherapi\Api;

use Auponomarev\Weatherapi\Fields;
use Bitrix\Main\Web\HttpClient;

/**
 * API получить данные с сайта Яндекс.Погода
 */
final class YandexWeather implements Request
{
    public function getRequest(string $lat, string $lon, string $lang, string $api_key): Fields
    {
        $url = "https://api.weather.yandex.ru/v2/forecast?" . http_build_query([
            'lat' => $lat,
            'lon' => $lon,
        ]);
    
        $opts = array(
            'http' => array(
                'method' => 'GET',
                'header' => 'X-Yandex-Weather-Key: ' . $api_key
            )
        );
    
        $context = stream_context_create($opts);
        $file = file_get_contents($url, false, $context);
        $response = json_decode($file, 1);
        return new Fields(
            name: $response['geo_object']['province']['name'] ?? '',
            weather: $response['fact']['condition'],
            temp: $response['fact']['temp'],
            feels_like: $response['fact']['feels_like'],
            humidity: $response['fact']['humidity'],
            icon: $response['fact']['icon'],
            windspeed: $response['fact']['wind_speed'],
        );
    }
}
