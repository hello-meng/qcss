<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit25ebd536702c9b1b6c639804212c2603
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Picqer\\Barcode\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Picqer\\Barcode\\' => 
        array (
            0 => __DIR__ . '/..' . '/picqer/php-barcode-generator/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit25ebd536702c9b1b6c639804212c2603::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit25ebd536702c9b1b6c639804212c2603::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}