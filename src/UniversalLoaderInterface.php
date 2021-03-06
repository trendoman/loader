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
 * Interface for universal loading
 * 
 * @category Seeren
 * @package Loader
 */
interface UniversalLoaderInterface
{

   /**
    * Compose
    * 
    * @param string $fileName
    * @return LoaderInterface static
    */
   public function compose(string $fileName): LoaderInterface;

}
