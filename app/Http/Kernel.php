<?php

namespace App\Http;

use App\Models\DataTransaksi;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Schedule;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Session\Middleware\StartSession;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class Kernel extends HttpKernel
{
    /**
     * Global route middleware
     */
    protected $routeMiddleware = [
        'auth' => Authenticate::class,
        'guest' => RedirectIfAuthenticated::class,
        'role' => RoleMiddleware::class
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            DataTransaksi::where('status', 'pending')
                ->where('tanggal_transaksi', '<', now()->subDays(2))
                ->update(['status' => 'dibatalkan']);
        })->everyMinute(); // untuk testing
    }

    /**
     * Middleware groups untuk web & api
     */
    protected $middlewareGroups = [
        'web' => [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
            PreventBackHistory::class,
        ],

        'api' => [
            ThrottleRequests::class . ':api',
            SubstituteBindings::class,
        ],
    ];
}
