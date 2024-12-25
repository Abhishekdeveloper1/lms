<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbf24ea576c8a3cd5b7fbaa4b8be94c18
{
    public static $files = array (
        'd959b7ce56fd4c385033a0bfb1be9532' => __DIR__ . '/../..' . '/src/helper.php',
    );

    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LMS\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LMS\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitbf24ea576c8a3cd5b7fbaa4b8be94c18::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbf24ea576c8a3cd5b7fbaa4b8be94c18::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbf24ea576c8a3cd5b7fbaa4b8be94c18::$classMap;

        }, null, ClassLoader::class);
    }
}