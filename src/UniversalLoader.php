<?php

/**
 * This file contain Seeren\Loader\UniversalLoader class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/loader
 * @version 1.0.1
 */

namespace Seeren\Loader;

/**
 * Class for universal loading
 * 
 * @category Seeren
 * @package Loader
 */
class UniversalLoader extends Loader implements
    UniversalLoaderInterface,
    Psr4Interface,
    ClassMapInterface,
    LoaderInterface
{

   private
       /**
        * @var Psr4 psr-4 loader
        */
       $psr4,
       /**
        * @var ClassMap class map loader
        */
       $classMap;

    /**
     * Construct UniversalLoader
     * 
     * @param Psr4Interface $psr4 psr-4 loader
     * @param ClassMapInterface $classMap class map loader
     * @return null
     */
    public final function __construct(
        Psr4Interface $psr4,
        ClassMapInterface $classMap)
    {
        parent::__construct();
        $this->psr4 = $psr4;
        $this->classMap = $classMap;
    }

    /**
     * Template method Get file name
     *
     * @param string $className class name
     * @return string file name
     */
    protected final function fileName(string $className): string
    {
        return "";
    }

    /**
     * Load file for className
     *
     * @param string $className class name
     * @return bool loaded or not
     */
    public final function load(string $className): bool
    {
        parent::load($className);
        if ($this->psr4->load($className)
         || $this->classMap->load($className)) {
            return true;
        }
        return false;
    }

    /**
     * Compose loader
     * 
     * @param string $fileName
     * @return LoaderInterface static
     */
    public final function compose(string $fileName): LoaderInterface
    {
       if (is_file($fileName)
        && ($config = json_decode(file_get_contents($fileName)))
        && isset($config->{"autoload"})
        && isset($config->{"autoload"}->{"psr-4"})) {
           $includePath = dirname($fileName) . DIRECTORY_SEPARATOR;
           foreach ($config->{"autoload"}->{"psr-4"} as $key => $value) {
               $this->addPrefix($key, $includePath . $value);
           }
       }
       return $this;
    }

    /**
     * Add prefix
     *
     * @param string $prefix namespace prefix
     * @param string|array $baseDirectory base directory
     * @return LoaderInterface static
     */
    public final function addPrefix(
        string $prefix,
        $baseDirectory): LoaderInterface
    {
        $this->psr4->addPrefix($prefix, $baseDirectory);
        return $this;
    }

    /**
     * Remove prefix
     *
     * @param string $prefixe namespace prefix
     * @return LoaderInterface static
     */
    public final function removePrefix(string $prefix): LoaderInterface
    {
        $this->psr4->removePrefix($prefix);
        return $this;
    }

    /**
     * Add class
     *
     * @param string $className class name
     * @param string $classPath class path
     * @return LoaderInterface static
     */
    public final function addClass(
        string $className,
        string $classPath): LoaderInterface
    {
        $this->classMap->addClass($className, $classPath);
        return $this;
    }

    /**
     * Remove class
     *
     * @param string $className class name
     * @return LoaderInterface static
     */
    public final function removeClass(string $className): LoaderInterface
    {
        $this->classMap->removeClass($className);
        return $this;
    }

}
