<?php

/**
 * This file contain Seeren\Loader\ClassMap class
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
 * Class for class map loading
 * 
 * @category Seeren
 * @package Loader
 */
class ClassMap extends Loader implements ClassMapInterface, LoaderInterface
{

    private
        /**
         * @var array class name collection
         */
        $className;

    /**
     * Construct ClassMap
     * 
     * @param string $includePath include path
     * @return null
     */
    public final function __construct()
    {
        parent::__construct();
        $this->className = [];
    }

    /**
     * Template method Get file name
     *
     * @param string $className class name
     * @return string file name
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
        if (!array_key_exists($className, $this->className)) {
            $this->className[$className] = ltrim(
                $classPath,
                DIRECTORY_SEPARATOR);
        }
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
        if (array_key_exists($className, $this->className)) {
            unset($this->className[$className]);
        }
        return $this;
    }

}
