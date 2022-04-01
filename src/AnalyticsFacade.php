<?php

namespace Immera\Analytics;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Immera\Analytics\Skeleton\SkeletonClass
 */
class AnalyticsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'analytics';
    }
}
