<?php

    return [
        "pdo" => [
            "dsn" => 'mysql:host='.(getenv('MYSQL_HOST') ?: 'localhost').';dbname=mini_chat_arnaud;charset=utf8',
            "user" => 'root',
            "password" => ''
        ],
        "limitMessages" => 50
    ];

?>