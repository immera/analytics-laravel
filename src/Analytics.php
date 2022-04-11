<?php

namespace Immera\Analytics;

use Illuminate\Support\Facades\Http;

class Analytics
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('analytics.base_url');
    }

    public static function getData(array $filter = [])
    {
        $response = Http::accept('application/json')->withHeaders([
            'Content-Type' => 'application/json',
            'client_id' => config('immera-analytics.client_id'),
        ])->withBody(json_encode($filter), 'application/json')->post(self::getDataUrl());

        return $response;
    }

    public static function storeData($data)
    {
        $response = Http::accept('application/json')->withHeaders([
            'Content-Type' => 'application/json',
            'client_id' => config('immera-analytics.client_id'),
        ])->withBody(json_encode($data), 'application/json')->post(self::storeDataUrl());
    }

    public function getDataUrl()
    {
        return $this->baseUrl . 'getData';
    }

    public function storeDataUrl()
    {
        return $this->baseUrl . 'storeData';
    }
}
