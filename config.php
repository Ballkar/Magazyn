<?php


return [
    "database" => [
        "dsn" => "mysql:host=127.0.0.1",
        "databaseName" => "crud",
        "userTable"=>'user',
        "storageTable"=>'storage',
        "charset" => "utf8",
        "user" => "root",
        "password" => "",
        "option" => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    ],
    "App" => [
        'AppName' => 'magazyn-master'
    ]

];
