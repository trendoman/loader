<?php

/**
 * This file contain Seeren\Loader\Psr4Interface interface
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
 * Interface for psr-4 loading
 * 
 * @category Seeren
 * @package Loader
 * @see http://www.php-fig.org/psr/psr-4/
 */
interface Psr4Interface extends LoaderInterface
{

    /**
     * Add prefix
     *
     * @param string $prefix namespace prefix
     * @param string|array $baseDirectory base directory
     * @return LoaderInterface self
     */
    public function addPrefix(string $prefix, $baseDirectory): LoaderInterface;

    /**
     * Remove prefix
     * 
     * @param string $prefix namespace prefix
     * @return LoaderInterface self
     */
    public function removePrefix(string $prefix): LoaderInterface;

}
