<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\UserMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        $middleware->alias([

            'pasien' => \App\Http\Middleware\UserMiddleware::class,
            'admin_poli' => \App\Http\Middleware\Admin_poliMiddleware::class,
            'admin_pendaftaran' => \App\Http\Middleware\Admin_pendaftaranMiddleware::class,

        ]);


    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
