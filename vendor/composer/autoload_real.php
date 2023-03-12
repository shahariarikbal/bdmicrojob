<?php

// autoload_real.php @generated by Composer

<<<<<<< HEAD
class ComposerAutoloaderInit254e30422739aea4974ccb5b6b13a8ed
=======
class ComposerAutoloaderInit3b03a08df4861a9e29784ac2199861c7
>>>>>>> 8b8e6666efe06c5173ea8d732e1c64d3335cbccb
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
        spl_autoload_register(array('ComposerAutoloaderInit254e30422739aea4974ccb5b6b13a8ed', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit254e30422739aea4974ccb5b6b13a8ed', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit254e30422739aea4974ccb5b6b13a8ed::getInitializer($loader));

        $loader->register(true);

        $filesToLoad = \Composer\Autoload\ComposerStaticInit254e30422739aea4974ccb5b6b13a8ed::$files;
        $requireFile = static function ($fileIdentifier, $file) {
            if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
                $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

                require $file;
            }
        };
        foreach ($filesToLoad as $fileIdentifier => $file) {
            ($requireFile)($fileIdentifier, $file);
=======
        spl_autoload_register(array('ComposerAutoloaderInit3b03a08df4861a9e29784ac2199861c7', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(\dirname(__FILE__)));
        spl_autoload_unregister(array('ComposerAutoloaderInit3b03a08df4861a9e29784ac2199861c7', 'loadClassLoader'));

        $useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded());
        if ($useStaticLoader) {
            require __DIR__ . '/autoload_static.php';

            call_user_func(\Composer\Autoload\ComposerStaticInit3b03a08df4861a9e29784ac2199861c7::getInitializer($loader));
        } else {
            $map = require __DIR__ . '/autoload_namespaces.php';
            foreach ($map as $namespace => $path) {
                $loader->set($namespace, $path);
            }

            $map = require __DIR__ . '/autoload_psr4.php';
            foreach ($map as $namespace => $path) {
                $loader->setPsr4($namespace, $path);
            }

            $classMap = require __DIR__ . '/autoload_classmap.php';
            if ($classMap) {
                $loader->addClassMap($classMap);
            }
        }

        $loader->register(true);

        if ($useStaticLoader) {
            $includeFiles = Composer\Autoload\ComposerStaticInit3b03a08df4861a9e29784ac2199861c7::$files;
        } else {
            $includeFiles = require __DIR__ . '/autoload_files.php';
        }
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequire3b03a08df4861a9e29784ac2199861c7($fileIdentifier, $file);
>>>>>>> 8b8e6666efe06c5173ea8d732e1c64d3335cbccb
        }

        return $loader;
    }
}
<<<<<<< HEAD
=======

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequire3b03a08df4861a9e29784ac2199861c7($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
>>>>>>> 8b8e6666efe06c5173ea8d732e1c64d3335cbccb
