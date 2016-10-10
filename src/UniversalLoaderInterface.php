<?php

/**
 * This file contain Seeren\Loader\UniversalLoaderInterface interface
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
 * Interface for universal loading
 * 
 * @category Seeren
 * @package Loader
 */
interface UniversalLoaderInterface
{

   /**
    * 
    * @param string $fileName
    * @return LoaderInterface static
    */
   public function compose(string $fileName): LoaderInterface;

}
