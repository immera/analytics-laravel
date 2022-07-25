<?php

namespace Immera\Analytics;

class AnalyticsQuery
{
    private $query = [];

    public function __call($method, $args)
    {
        $this->query[] = (object) [
            "$$method" => $args[0],
        ];

        return $this;
    }

    public function toArray()
    {
        return $this->query;
    }

    public function fetchJson()
    {
        return Analytics::fetchJson($this->query);
    }

    public function fetch()
    {
        return Analytics::fetch($this->query);
    }
}
