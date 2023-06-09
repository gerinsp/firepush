<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4512f50cf013978d872ccaed784d9b02
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Gsp\\Firepush\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Gsp\\Firepush\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit4512f50cf013978d872ccaed784d9b02::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4512f50cf013978d872ccaed784d9b02::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4512f50cf013978d872ccaed784d9b02::$classMap;

        }, null, ClassLoader::class);
    }
}
