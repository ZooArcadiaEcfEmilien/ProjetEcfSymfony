<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';
if (!file_exists(dirname(__DIR__).'/.env')) {
    // Charge les variables d'environnement à partir de la configuration de Heroku
    (new Symfony\Component\Dotenv\Dotenv())->load(__DIR__.'/.env.local');
}
return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};