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
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */

namespace Seeren\Loader;

/**
 * Interface for class map loading
 * 
 * @category Seeren
 * @package Loader
 */
interface ClassMapInterface extends LoaderInterface
{

    /**
     * Add class
     *
     * @param string $className class name
     * @param string $classPath class path
     * @return LoaderInterface self
     */
    public function addClass(
        string $className,
        string $classPath): LoaderInterface;

    /**
     * Remove class
     * 
     * @param string $className class name
     * @return LoaderInterface self
     */
    public function removeClass(string $className): LoaderInterface;

}
