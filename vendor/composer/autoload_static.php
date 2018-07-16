<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6594ad3f1598662b9e021df7c64f5309
{
    public static $classMap = array (
        'App\\controllers\\ProductController' => __DIR__ . '/../..' . '/controllers/ProductController.php',
        'App\\controllers\\StorageController' => __DIR__ . '/../..' . '/controllers/StorageController.php',
        'App\\controllers\\sessionController' => __DIR__ . '/../..' . '/controllers/sessionController.php',
        'App\\core\\App' => __DIR__ . '/../..' . '/core/App.php',
        'App\\core\\URI' => __DIR__ . '/../..' . '/core/URI.php',
        'App\\core\\database\\connector' => __DIR__ . '/../..' . '/core/database/connector.php',
        'App\\core\\database\\querybuilder' => __DIR__ . '/../..' . '/core/database/querybuilder.php',
        'App\\core\\message' => __DIR__ . '/../..' . '/core/message.php',
        'App\\core\\navigator' => __DIR__ . '/../..' . '/core/navigator.php',
        'App\\core\\product' => __DIR__ . '/../..' . '/core/product.php',
        'App\\core\\router' => __DIR__ . '/../..' . '/core/router.php',
        'App\\core\\user' => __DIR__ . '/../..' . '/core/user.php',
        'App\\core\\validator' => __DIR__ . '/../..' . '/core/validator.php',
        'ComposerAutoloaderInit6594ad3f1598662b9e021df7c64f5309' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit6594ad3f1598662b9e021df7c64f5309' => __DIR__ . '/..' . '/composer/autoload_static.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit6594ad3f1598662b9e021df7c64f5309::$classMap;

        }, null, ClassLoader::class);
    }
}
