<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit87d42ce7bd4df0fc66d87a93231cc241
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit87d42ce7bd4df0fc66d87a93231cc241::$classMap;

        }, null, ClassLoader::class);
    }
}
