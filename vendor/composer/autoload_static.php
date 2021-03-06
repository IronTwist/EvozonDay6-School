<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6c8c1071c8fed8ca53f09fad1b187b52
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'School\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'School\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6c8c1071c8fed8ca53f09fad1b187b52::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6c8c1071c8fed8ca53f09fad1b187b52::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6c8c1071c8fed8ca53f09fad1b187b52::$classMap;

        }, null, ClassLoader::class);
    }
}
