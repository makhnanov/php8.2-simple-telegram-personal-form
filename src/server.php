<?php

declare(strict_types=1);

use JetBrains\PhpStorm\NoReturn;

if (!array_key_exists('REQUEST_METHOD', $_SERVER)) {
    echo 'This script only for server usage!';
    die();
}

const SERVER = 'https://api.telegram.org/bot';
const TOKEN = '6437088323:AAHtGDi42VPoYQf88OlPZzBCL6VoEfMU3og';
# Public channel https://t.me/qwertsxfgdfg
const CHAT_ID = '-1001958240606';

match ($_SERVER['REQUEST_METHOD']) {
    default => processOther(),
    'GET' => processGet(),
    'POST' => processPost(),
};

function processGet(): void {
    require_once 'index.php';
}

#[NoReturn]
function processOther(): void {
    echo 'Only GET or POST methods allowed!';
    die();
}

function processPost(): void {
    try {
        if (!fopen(getUrl(), 'r')) {
            die('Error.');
        }
    } catch (Throwable) {
        die('Exception.');
    }
    echo <<<HTML
<a href="/">
    <button>
        Success! Send again >
    </button>
</a>
HTML;
}

function getUrl(): string {
    $text = prepareMessage([
        'ФИО' => 'user_name',
        'Email' => 'user_email',
        'Телефон' => 'user_phone',
    ]);
    $buildQuery = http_build_query([
        'chat_id' => CHAT_ID,
        'text' => $text,
        'parse_mode' => 'markdown',
    ]);
    return SERVER . TOKEN . '/sendMessage?' . $buildQuery;
}

function prepareMessage($assoc): string {
    $data = array_map(fn($key) => $_POST[$key] ?? null, $assoc);
    # Массив также можно передать методом POST, но нам нужны только строки.
    $onlyStrings = array_filter($data, 'is_string');
    $trimmedStrings = array_map('trim', $onlyStrings);
    # array_filter без колбэка работает как empty и уберёт строки = '0'
    $validator = fn($value) => $value !== '';
    $filtered = array_filter($trimmedStrings, $validator);
    $processLine = function ($key) use ($filtered) {
        return sprintf('*%s*: %s', $key, $filtered[$key]);
    };
    $lines = array_map($processLine, array_keys($filtered));
    $text = implode(PHP_EOL, $lines);
    if (strlen($text) > 4000) {
        die('<a href="/">Text must be less than 4k symbols.</a>');
    }
    return $text;
}
