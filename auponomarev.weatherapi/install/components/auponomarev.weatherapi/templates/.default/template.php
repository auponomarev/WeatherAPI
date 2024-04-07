<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
    die();
}
/** @var array $arResult */
/** @var string $templateFolder */

$this->setFrameMode(true);
$this->SetViewTarget("sidebar", 10);
?>
<div class="weather sidebar-widget sidebar-widget-tasks">
    <div class="sidebar-widget-top">
        <h2 class="weather__title">
            Погода: <?= $arResult['WeatherAPI']['name'] ?>
        </h2>
    </div>
    <div class="sidebar-widget-content">
        <div class="weather__weather">
            <img src="<?= $arResult['WeatherAPI']['iconUrl'] ?>">
            <span class="weather__status"><?= $arResult['WeatherAPI']['weather'] ?></span>
        </div>
        <div class="weather__other">
            <span class="weather__temp">
                <?= $arResult['WeatherAPI']['temp']?>°C
            </span>
            <span class="weather__humidity">
                <img src="<?= $templateFolder ?>/icons/humidity.png"> <?= $arResult['WeatherAPI']['humidity']?>%
            </span>
            <span class="weather__wind">
                <img src="<?= $templateFolder ?>/icons/wind.png"> <?= $arResult['WeatherAPI']['windspeed']?>м/c
            </span>
        </div>
    </div>
</div>