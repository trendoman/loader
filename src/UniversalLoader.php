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
 * @link http://www.seeren.fr/ Seeren
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
    ClassMapInterface
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
    public function __construct(
        Psr4Interface $psr4,
        ClassMapInterface $classMap)
    {
        parent::__construct();
        $this->psr4 = $psr4;
        $this->classMap = $classMap;
    }

    /**
     *
     * @param string $fileName
     * @return UniversalLoaderInterface
     */
    public final function compose(string $fileName): UniversalLoaderInterface
    {
       if (is_file($fileName)
        && ($config = json_decode(file_get_contents($fileName)))
        && isset($config->{"autoload"})
        && isset($config->{"autoload"}->{"psr-4"})) {
           $includePath = dirname($fileName) . DIRECTORY_SEPARATOR;
           foreach ($config->{"autoload"}->{"psr-4"} as $key => &$value) {
               $this->psr4->addPrefix($key, $includePath . $value);
           }
       }
       return $this;
    }

    /**
     * Template method Get file name
     *
     * @param string $className class name
     * @return string file name
     */
    public final function fileName(string $className): string
    {
        if (($fileName = $this->psr4->fileName($className))
         || ($fileName = $this->classMap->fileName($className))) {
            return $fileName;
        }
        return "";
    }

    /**
     * Add prefix
     *
     * @param string $prefix namespace prefix
     * @param string|array $baseDirectory base directory
     * @return LoaderInterface self
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
     * @return LoaderInterface self
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
     * @return LoaderInterface self
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
     * @return LoaderInterface self
     */
    public final function removeClass(string $className): LoaderInterface
    {
        $this->classMap->removeClass($className);
        return $this;
    }

}
