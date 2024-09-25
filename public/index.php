<?php

use App\Kernel;
use Symfony\Component\Dotenv\Dotenv;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

$dotenv = new Dotenv();
if (!$_SERVER['APP_ENV'] || $_SERVER['APP_ENV'] === 'dev') {
    $dotenv->load(dirname(__DIR__) . '/.env');
}

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
