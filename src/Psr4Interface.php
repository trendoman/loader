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
 * Interface for psr-4 loading
 * 
 * @category Seeren
 * @package Loader
 * @see http://www.php-fig.org/psr/psr-4/
 */
interface Psr4Interface
{

    /**
     * Add prefix
     *
     * @param string $prefix namespace prefix
     * @param string|array $baseDirectory base directory
     * @return LoaderInterface static
     */
    public function addPrefix(string $prefix, $baseDirectory): LoaderInterface;

    /**
     * Remove prefix
     * 
     * @param string $prefix namespace prefix
     * @return LoaderInterface static
     */
    public function removePrefix(string $prefix): LoaderInterface;

}
