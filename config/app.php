<?php

declare(strict_types=1);

use App\Providers\AppServiceProvider;
use App\Providers\RouteServiceProvider;
use Illuminate\Cache\CacheServiceProvider;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Filesystem\FilesystemServiceProvider;
use Illuminate\Foundation\Providers\ConsoleSupportServiceProvider;
use Illuminate\Foundation\Providers\FoundationServiceProvider;
use Illuminate\Queue\QueueServiceProvider;
use Illuminate\Support\Facades\Facade;
use Illuminate\Translation\TranslationServiceProvider;
use Illuminate\Validation\ValidationServiceProvider;
use Illuminate\View\ViewServiceProvider;

return [
    'name' => env('APP_NAME', 'Laravel'),
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool)env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'asset_url' => env('ASSET_URL'),
    'timezone' => 'Asia/Nicosia',
    'locale' => 'en',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'key' => env('APP_KEY'),
    'cipher' => 'AES-256-CBC',
    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],
    'providers' => [
        //AuthServiceProvider::class,
        //BroadcastServiceProvider::class,
        //BusServiceProvider::class,
        CacheServiceProvider::class,
        ConsoleSupportServiceProvider::class,
        //CookieServiceProvider::class,
        DatabaseServiceProvider::class,
        //EncryptionServiceProvider::class,
        FilesystemServiceProvider::class,
        FoundationServiceProvider::class,
        //HashServiceProvider::class,
        //MailServiceProvider::class,
        //NotificationServiceProvider::class,
        //PaginationServiceProvider::class,
        //PipelineServiceProvider::class,
        QueueServiceProvider::class,
        //RedisServiceProvider::class,
        //PasswordResetServiceProvider::class,
        //SessionServiceProvider::class,
        TranslationServiceProvider::class,
        ValidationServiceProvider::class,
        ViewServiceProvider::class,

        AppServiceProvider::class,
        //EventServiceProvider::class,
        RouteServiceProvider::class,

    ],

    'aliases' => Facade::defaultAliases()->merge([])->toArray(),
];
