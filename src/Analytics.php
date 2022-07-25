<?php

namespace Immera\Analytics;

use Illuminate\Support\Facades\Http;

class Analytics
{
    public static function query()
    {
        return new AnalyticsQuery();
    }

    public static function fetch($data = [])
    {
        if ($data instanceof AnalyticsQuery) {
            $data = $data->toArray();
        }

        return Http::withoutVerifying()
            ->acceptJson()
            ->asJson()
            ->withHeaders(['key' => config('immera.analytics.serial_key')])
            ->withBody(json_encode($data), 'application/json')
            ->post(config('immera.analytics.base_url').'api/fetch');
    }

    public static function store(array $data)
    {
        return Http::withoutVerifying()
            ->acceptJson()
            ->asJson()
            ->withHeaders(['key' => config('immera.analytics.serial_key')])
            ->withBody(json_encode($data), 'application/json')
            ->post(config('immera.analytics.base_url').'api/store');
    }

    public static function fetchJson($data = [])
    {
        return self::fetch($data)->json();
    }

    public static function storeJson(array $data)
    {
        return self::store($data)->json();
    }
}
