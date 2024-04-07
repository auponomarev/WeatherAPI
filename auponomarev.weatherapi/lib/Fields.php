<?php

namespace Auponomarev\Weatherapi;

/**
 * ДТО описание полей для API виджета погода.
 */
final class Fields
{
    public function __construct(
        protected ?string $name = '',
        protected ?string $weather = '',
        protected ?string $temp = '',
        protected ?string $feels_like = '',
        protected ?string $humidity = '',
        protected ?string $icon = '',
        protected ?string $windspeed = '',
    ) {
    }
    
    /**
     * Город, населенный пункт
     * @return string
     */
    public function getName(): string
    {
        return $this->name ?? '';
    }
    
    /**
     * Описание погоды
     * @return string
     */
    public function getWeather(): string
    {
        $condition = [
            'clear' => 'ясно',
            'partly-cloudy' => 'малооблачно',
            'cloudy' => 'облачно с прояснениями',
            'overcast' => 'пасмурно',
            'light-rain' => 'небольшой дождь',
            'rain' => 'дождь',
            'heavy-rain' => 'сильный дождь',
            'showers' => 'ливень',
            'wet-snow' => 'дождь со снегом',
            'light-snow' => 'небольшой снег',
            'snow' => 'снег',
            'snow-showers' => 'снегопад',
            'hail' => 'град',
            'thunderstorm' => 'гроза',
            'thunderstorm-with-rain' => 'дождь с грозой',
            'thunderstorm-with-hail' => 'гроза с градом',
        ];
        
        if (array_key_exists($this->weather, $condition)) {
            return $condition[$this->weather];
        }
        
        return '';
    }
    
    /**
     * Текущая температура
     * @return string
     */
    public function getTemp(): string
    {
        return $this->temp ?? '';
    }
    
    /**
     * Как чувствуется температура в С
     * @return string
     */
    public function getFeels_like(): string
    {
        return $this->feels_like ?? '';
    }
    
    /**
     * Влажность, %
     * @return string
     */
    public function getHumidity(): string
    {
        return $this->humidity ?? '';
    }
    
    /**
     * Скорость ветра, м/с
     * @return string
     */
    
    public function getWindspeed(): string
    {
        return $this->windspeed ?? '';
    }
    
    /**
     * Код иконки
     * @return string
     */
    public function getIcon(): string
    {
        return "https://yastatic.net/weather/i/icons/funky/dark/{$this->icon}.svg";
    }
    
}
