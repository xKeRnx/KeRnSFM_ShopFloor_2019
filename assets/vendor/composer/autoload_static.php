<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7b5376fa4ed5abf5f839e2377edafe96
{
    public static $files = array (
        'a0edc8309cc5e1d60e3047b5df6b7052' => __DIR__ . '/..' . '/guzzlehttp/psr7/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'YoHang88\\LetterAvatar\\' => 22,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
        ),
        'I' => 
        array (
            'Intervention\\Image\\' => 19,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'YoHang88\\LetterAvatar\\' => 
        array (
            0 => __DIR__ . '/..' . '/yohang88/letter-avatar/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Intervention\\Image\\' => 
        array (
            0 => __DIR__ . '/..' . '/intervention/image/src/Intervention/Image',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7b5376fa4ed5abf5f839e2377edafe96::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7b5376fa4ed5abf5f839e2377edafe96::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
