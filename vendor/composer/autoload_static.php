<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita8a40a1033368b1b6dd3a1c202ccde7b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita8a40a1033368b1b6dd3a1c202ccde7b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita8a40a1033368b1b6dd3a1c202ccde7b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita8a40a1033368b1b6dd3a1c202ccde7b::$classMap;

        }, null, ClassLoader::class);
    }
}
