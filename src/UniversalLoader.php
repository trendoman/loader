<?php

/**
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @author (c) Cyril Ichti <consultant@seeren.fr>
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
        * @var Psr4
        */
       $psr4,
       /**
        * @var ClassMap
        */
       $classMap;

    /**
     * @param Psr4Interface $psr4 psr-4 loader
     * @param ClassMapInterface $classMap class map loader
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
     * {@inheritDoc}
     * @see \Seeren\Loader\Loader::fileName()
     */
    protected final function fileName(string $className): string
    {
        return "";
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Loader\Loader::load()
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
     * {@inheritDoc}
     * @see \Seeren\Loader\UniversalLoaderInterface::compose()
     */
    public final function compose(string $fileName): LoaderInterface
    {
       if (is_file($fileName)){
           $config = json_decode(file_get_contents($fileName));
           if (is_object($config)
            && isset($config->{"autoload"})
            && isset($config->{"autoload"}->{"psr-4"})) {
               $includePath = dirname($fileName) . DIRECTORY_SEPARATOR;
               foreach ($config->{"autoload"}->{"psr-4"} as $key => $value) {
                   $this->addPrefix($key, $includePath . $value);
               }
           }
       }
       return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Loader\Psr4Interface::addPrefix()
     */
    public final function addPrefix(
        string $prefix,
        $baseDirectory): LoaderInterface
    {
        $this->psr4->addPrefix($prefix, $baseDirectory);
        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Loader\Psr4Interface::removePrefix()
     */
    public final function removePrefix(string $prefix): LoaderInterface
    {
        $this->psr4->removePrefix($prefix);
        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Loader\ClassMapInterface::addClass()
     */
    public final function addClass(
        string $className,
        string $classPath): LoaderInterface
    {
        $this->classMap->addClass($className, $classPath);
        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Loader\ClassMapInterface::removeClass()
     */
    public final function removeClass(string $className): LoaderInterface
    {
        $this->classMap->removeClass($className);
        return $this;
    }

}
