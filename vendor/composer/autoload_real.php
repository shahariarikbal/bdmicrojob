<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit163af229efdde53ab25b84f3ca0ffae4
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

<<<<<<< HEAD
        spl_autoload_register(array('ComposerAutoloaderInit163af229efdde53ab25b84f3ca0ffae4', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit163af229efdde53ab25b84f3ca0ffae4', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit163af229efdde53ab25b84f3ca0ffae4::getInitializer($loader));

        $loader->register(true);

        $filesToLoad = \Composer\Autoload\ComposerStaticInit163af229efdde53ab25b84f3ca0ffae4::$files;
        $requireFile = static function ($fileIdentifier, $file) {
=======
        spl_autoload_register(array('ComposerAutoloaderInit3b03a08df4861a9e29784ac2199861c7', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit3b03a08df4861a9e29784ac2199861c7', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit3b03a08df4861a9e29784ac2199861c7::getInitializer($loader));

        $loader->register(true);

        $filesToLoad = \Composer\Autoload\ComposerStaticInit3b03a08df4861a9e29784ac2199861c7::$files;
        $requireFile = \Closure::bind(static function ($fileIdentifier, $file) {
>>>>>>> ae840ab25f655ba5a0f9e1cd5854afe2480220ee
            if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
                $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

                require $file;
            }
<<<<<<< HEAD
        };
        foreach ($filesToLoad as $fileIdentifier => $file) {
            ($requireFile)($fileIdentifier, $file);
=======
        }, null, null);
        foreach ($filesToLoad as $fileIdentifier => $file) {
            $requireFile($fileIdentifier, $file);
>>>>>>> ae840ab25f655ba5a0f9e1cd5854afe2480220ee
        }

        return $loader;
    }
}
