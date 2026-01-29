<?php

use App\Http\Middleware\CheckAge;
use App\Http\Middleware\CheckLoginUser;
use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //middle trong này sẽ globle.

        // $middleware->append(CheckTimeAccess::class);
        // $middleware->append(CheckAge::class);
        // $middleware->append(CheckLoginUser::class);

        //còn viết như này sẽ chỉ tạo nickname
        $middleware->alias([
            'checkuser' => CheckLoginUser::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
