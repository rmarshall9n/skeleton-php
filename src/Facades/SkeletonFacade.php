<?php

namespace Rmarshall9n\Skeleton\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rmarshall9n\Skeleton\SkeletonClass
 */
class SkeletonFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'skeleton';
    }
}
