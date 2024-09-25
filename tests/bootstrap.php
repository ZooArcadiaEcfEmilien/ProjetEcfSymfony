<?php

use Symfony\Component\Dotenv\Dotenv;
use App\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

// Ne charger .env que si APP_ENV n'est pas défini ou est en développement
$dotenv = new Dotenv();
if (empty($_SERVER['APP_ENV']) || $_SERVER['APP_ENV'] === 'dev') {
    $dotenv->load(dirname(__DIR__) . '/.env');
}

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
