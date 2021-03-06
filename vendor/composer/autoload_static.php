<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit81caada3e3504a59e0fcb3f1d7e7c9e3
{
    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'laring\\core\\' => 12,
        ),
        'a' => 
        array (
            'app\\models\\' => 11,
            'app\\controllers\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'laring\\core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'app\\models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'app\\controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit81caada3e3504a59e0fcb3f1d7e7c9e3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit81caada3e3504a59e0fcb3f1d7e7c9e3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
