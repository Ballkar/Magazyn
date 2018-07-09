<?php


return [
    "database"=>[
        "dsn"=>"mysql:host=127.0.0.1",
        "dbname"=>"magazyn",
        "charset"=>"utf8",
        "user"=>"root",
        "password"=>"",
        "option"=>[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    ]
];