<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite51b16812f9ef0d866cd8464d2f3445a {
    public static $prefixLengthsPsr4 = [
        'D' => [
            'DevOwl\\Freemium\\Test\\' => 21,
            'DevOwl\\Freemium\\' => 16
        ]
    ];

    public static $prefixDirsPsr4 = [
        'DevOwl\\Freemium\\Test\\' => [
            0 => __DIR__ . '/../..' . '/test/phpunit'
        ],
        'DevOwl\\Freemium\\' => [
            0 => __DIR__ . '/../..' . '/src'
        ]
    ];

    public static $classMap = [
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php'
    ];

    public static function getInitializer(ClassLoader $loader) {
        return \Closure::bind(
            function () use ($loader) {
                $loader->prefixLengthsPsr4 = ComposerStaticInite51b16812f9ef0d866cd8464d2f3445a::$prefixLengthsPsr4;
                $loader->prefixDirsPsr4 = ComposerStaticInite51b16812f9ef0d866cd8464d2f3445a::$prefixDirsPsr4;
                $loader->classMap = ComposerStaticInite51b16812f9ef0d866cd8464d2f3445a::$classMap;
            },
            null,
            ClassLoader::class
        );
    }
}