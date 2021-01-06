<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit313b761bbf95b4e01dad15e765144ef9
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hybridauth\\' => 11,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hybridauth\\' => 
        array (
            0 => __DIR__ . '/..' . '/hybridauth/hybridauth/src',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit313b761bbf95b4e01dad15e765144ef9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit313b761bbf95b4e01dad15e765144ef9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
