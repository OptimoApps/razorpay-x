<?php

namespace OptimoApps\RazorPayX;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Optimoapps\RazorPayX\Skeleton\SkeletonClass
 */
class RazorPayXFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'razorpay-x';
    }
}
