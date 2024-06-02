<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * this apps gloval http middleware stack
     *
     * middleware run after every request to app
     *
     * @var array
     */
    protected $middleware = [
        // ...
    ];

    /**
     * route middleware groups
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // ...
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ],

        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * route middleware
     *
     * middleware can use groups or be individual
     * 
     * @var array
     */
    protected $routeMiddleware = [
        // ...
    ];
}
