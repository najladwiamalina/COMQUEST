<?php

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
    'VERCEL' => '1',
    'APP_DEBUG' => 'true',
    'LOG_CHANNEL' => 'stderr',
    'LOG_STACK' => 'stderr',
    'SESSION_DRIVER' => 'cookie',
    'CACHE_STORE' => 'array',
    'CACHE_DRIVER' => 'array',
    'QUEUE_CONNECTION' => 'sync',
    'APP_MAINTENANCE_DRIVER' => 'cache',
    'APP_MAINTENANCE_STORE' => 'array',
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

// Guard numeric env vars: an empty string bypasses Laravel's env() default and
// later blows up arithmetic (e.g. session.lifetime * 60 in StartSession middleware)
$numericEnvDefaults = [
    'SESSION_LIFETIME' => '120',
    'BCRYPT_ROUNDS' => '12',
];

foreach ($numericEnvDefaults as $key => $default) {
    $value = getenv($key);
    if ($value === false || !is_numeric($value)) {
        putenv("{$key}={$default}");
        $_ENV[$key] = $default;
        $_SERVER[$key] = $default;
    }
}

// Guard string env vars that must never be empty: env() only applies its
// default when the var is unset, not when it's "" — an empty DB_CONNECTION
// resolves to Manager::connection("") and throws "Database connection [] not configured."
$requiredEnvDefaults = [
    'DB_CONNECTION' => 'pgsql',
];

foreach ($requiredEnvDefaults as $key => $default) {
    $value = getenv($key);
    if ($value === false || trim((string) $value) === '') {
        putenv("{$key}={$default}");
        $_ENV[$key] = $default;
        $_SERVER[$key] = $default;
    }
}

if (empty(getenv('APP_KEY')) || trim((string)getenv('APP_KEY')) === '') {
    $fallbackKey = 'base64:eS9VdTJ4MlpMdkplNXBsdnZCRzVkZ0NqS3kxeWVnZDI=';
    putenv("APP_KEY={$fallbackKey}");
    $_ENV['APP_KEY'] = $fallbackKey;
    $_SERVER['APP_KEY'] = $fallbackKey;
}

// Suppress deprecation warnings from output but enable error display for debugging
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

try {
    // Forward the request to Laravel's public/index.php
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    error_log("LARAVEL CAUGHT ERROR: " . $e->getMessage() . "\n" . $e->getTraceAsString());
    if (!headers_sent()) {
        http_response_code(500);
    }
    echo "<h2>Laravel Serverless Exception</h2>";
    echo "<p><strong>" . htmlspecialchars($e->getMessage()) . "</strong></p>";
    echo "<p>File: " . htmlspecialchars($e->getFile()) . " line " . $e->getLine() . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}

