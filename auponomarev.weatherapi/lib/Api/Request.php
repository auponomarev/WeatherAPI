<?php

namespace Auponomarev\Weatherapi\Api;

use Auponomarev\Weatherapi\Fields;

interface Request
{
    public function getRequest(string $lat, string $lon, string $lang, string $api_key): Fields;
}