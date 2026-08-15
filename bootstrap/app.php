<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);
        
        // Exclude payment callback routes from CSRF verification
        $middleware->validateCsrfTokens(except: [
            '/payment/notify',
            '/payment/return',
            '/payment/cancel',
            '/payment/webxpay/notify',
            '/payment/webxpay/return',
            '/payment/webxpay/cancel',
            '/payment/kokopay/notify',
            '/payment/kokopay/return',
            '/payment/kokopay/cancel',
            '/pay/webxpayResponse',  // Legacy WebXPay return URL
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
