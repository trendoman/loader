<?php

/**
 * This file contain Seeren\Loader\LoaderInterface interface
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
 * Interface for load class
 * 
 * @category Seeren
 * @package Loader
 */
interface LoaderInterface
{

   /**
    * Load file for className
    * 
    * @param string $className class name
    * @return bool loaded or not
    */
   public function load(string $className): bool;

   /**
    * Register
    *
    * @return LoaderInterface self
    */
   public function register(): self;

   /**
    * Unregister
    *
    * @return LoaderInterface self
    */
   public function unregister(): self;

}
