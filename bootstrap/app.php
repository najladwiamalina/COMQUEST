<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL']) || getenv('VERCEL')) {
    $app->useStoragePath('/tmp/storage');

    $app->booted(function ($app) {
        $config = $app['config'];

        $config->set('session.driver', 'cookie');
        $config->set('cache.default', 'array');
        $config->set('queue.default', 'sync');
        $config->set('logging.default', 'stderr');
        $config->set('app.maintenance.driver', 'cache');
        $config->set('app.maintenance.store', 'array');

        if (!is_numeric($config->get('session.lifetime'))) {
            $config->set('session.lifetime', 120);
        }

        if (trim((string) $config->get('database.default')) === '') {
            $config->set('database.default', 'pgsql');
        }

        if (!is_numeric($config->get('hashing.bcrypt.rounds'))) {
            $config->set('hashing.bcrypt.rounds', 12);
        }

        // Vercel terminates TLS at the edge and forwards over plain HTTP internally,
        // so without this, asset()/url() generate http:// links that browsers block
        // as mixed content on the https:// page.
        $app['url']->forceScheme('https');
    });
}

return $app;
