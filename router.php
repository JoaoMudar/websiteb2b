<?php
// Router para o servidor embutido do PHP (php -S)
// Simula o comportamento do Apache: PHP_SELF sempre aponta para /index.php

if (php_sapi_name() === 'cli-server') {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Serve arquivos estáticos (css, js, imagens, etc.) diretamente
    if ($path !== '/' && is_file(__DIR__ . $path)) {
        return false;
    }

    // Força PHP_SELF para /index.php, como faria o mod_rewrite do Apache
    $_SERVER['PHP_SELF'] = '/index.php';
}

require __DIR__ . '/index.php';
