<?php

/**
 * This file contain Seeren\Loader\ClassMapInterface interface
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
 * Interface for class map loading
 * 
 * @category Seeren
 * @package Loader
 */
interface ClassMapInterface
{

    /**
     * Add class
     *
     * @param string $className class name
     * @param string $classPath class path
     * @return LoaderInterface static
     */
    public function addClass(
        string $className,
        string $classPath): LoaderInterface;

    /**
     * Remove class
     * 
     * @param string $className class name
     * @return LoaderInterface static
     */
    public function removeClass(string $className): LoaderInterface;

}
