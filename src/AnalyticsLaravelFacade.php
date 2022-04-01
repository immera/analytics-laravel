<?php

namespace Immera\AnalyticsLaravel;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Immera\AnalyticsLaravel\Skeleton\SkeletonClass
 */
class AnalyticsLaravelFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'analytics-laravel';
    }
}
