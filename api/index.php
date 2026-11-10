<?php

/**
 * Vercel Serverless Function Entry Point for Laravel
 */

// Prepare required temporary storage directories on Vercel
$tmpDirectories = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($tmpDirectories as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Ensure VERCEL environment flag is present
$_ENV['VERCEL'] = '1';
putenv('VERCEL=1');

// Set compiled view path to writable /tmp
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';

// Forward request to Laravel's public entrypoint
require __DIR__ . '/../public/index.php';
