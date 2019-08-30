<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create(__DIR__);
if (getenv('APP_ENV') !== 'production')
    $dotenv->load();
$dotenv->required([
    'REPOSITORY',
    'SITE_KEY',
    'SECRET_KEY',
    'SMTP_DEBUG',
    'SMTP_HOST',
    'SMTP_PORT',
    'SMTP_SECURE',
    'SMTP_AUTH',
    'SMTP_USERNAME',
    'SMTP_PASSWORD',
    'SMTP_FROM',
    'MAILTO_EMAIL',
    'MAILTO_NAME'
]);
