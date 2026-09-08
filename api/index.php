<?php

// Suppress deprecation warnings from output
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');

// Catch and log uncaught exceptions directly to Vercel STDERR and display error details
set_exception_handler(function (\Throwable $e) {
    error_log("LARAVEL ERROR: " . $e->getMessage() . "\n" . $e->getTraceAsString());
    if (!headers_sent()) {
        http_response_code(500);
    }
    echo "<h2>Laravel Error</h2><p><strong>" . htmlspecialchars($e->getMessage()) . "</strong></p><pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    exit;
});

// Prepare writable storage directories in /tmp for Vercel serverless environment
$storageDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Set environment variables in putenv, $_ENV, and $_SERVER for Laravel 11
$envOverrides = [
    'VIEW_COMPILED_PATH' => '/tmp/storage/framework/views',
    'APP_SERVICES_CACHE' => '/tmp/bootstrap/cache/services.php',
    'APP_PACKAGES_CACHE' => '/tmp/bootstrap/cache/packages.php',
    'APP_CONFIG_CACHE' => '/tmp/bootstrap/cache/config.php',
    'APP_ROUTES_CACHE' => '/tmp/bootstrap/cache/routes.php',
];

foreach ($envOverrides as $key => $val) {
    putenv("{$key}={$val}");
    $_ENV[$key] = $val;
    $_SERVER[$key] = $val;
}

// Forward the request to Laravel's public/index.php
require __DIR__ . '/../public/index.php';
