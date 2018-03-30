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
 * @version 1.0.2
 */

namespace Seeren\Loader;

/**
 * Class for class map loading
 * 
 * @category Seeren
 * @package Loader
 */
class ClassMap extends Loader implements ClassMapInterface, LoaderInterface
{

    private
        /**
         * @var array
         */
        $className;

    /**
     * @param string $includePath include path
     * @return null
     */
    public final function __construct()
    {
        parent::__construct();
        $this->className = [];
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Loader\Loader::fileName()
     */
    protected final function fileName(string $className): string
    {
        $fileName = "";
        if (array_key_exists($className, $this->className)) {
            $fileName = $this->className[$className];
            $this->removeClass($className);
        }
        return $fileName;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Loader\ClassMapInterface::addClass()
     */
    public final function addClass(
        string $className,
        string $path): LoaderInterface
    {
        if (!array_key_exists($className, $this->className)) {
            $this->className[$className] = ltrim($path, DIRECTORY_SEPARATOR);
        }
        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Loader\ClassMapInterface::removeClass()
     */
    public final function removeClass(string $className): LoaderInterface
    {
        if (array_key_exists($className, $this->className)) {
            unset($this->className[$className]);
        }
        return $this;
    }

}
