<?php
// Router para o servidor embutido do PHP (php -S)
// Simula o comportamento do Apache: PHP_SELF sempre aponta para /index.php

if (php_sapi_name() === 'cli-server') {
    // urldecode: nomes de arquivo com acento chegam percent-encoded e o
    // Apache os decodifica antes de procurar no disco. Sem isto, as imagens
    // de mapa (Ipê_roxo.jpg) só quebram no servidor local, o que engana.
    $path = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    // Serve arquivos estáticos (css, js, imagens, etc.) diretamente
    if ($path !== '/' && strpos($path, '..') === false && is_file(__DIR__ . $path)) {
        return false;
    }

    // Força PHP_SELF para /index.php, como faria o mod_rewrite do Apache
    $_SERVER['PHP_SELF'] = '/index.php';

    // O servidor embutido preenche SERVER_NAME com o endereço de bind
    // (0.0.0.0), e não com o Host pedido. Sem isto, css e imagens saem
    // apontando para um endereço que o navegador não alcança.
    if (! empty($_SERVER['HTTP_HOST'])) {
        $partes = explode(':', $_SERVER['HTTP_HOST']);
        $_SERVER['SERVER_NAME'] = $partes[0];
        $_SERVER['SERVER_PORT'] = isset($partes[1]) ? (int) $partes[1] : 80;
    }
}

require __DIR__ . '/index.php';
