<?php

/**
 * This file contain Seeren\Loader\Loader class
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
 * Class for load class
 * 
 * @category Seeren
 * @package Loader
 * @abstract
 */
abstract class Loader
{

   /**
    * Template method Get file name
    *
    * @param string $className class name
    * @return string file name
    */
   abstract public function fileName(string $className): string;

   /**
    * Construct Loader
    * 
    * @return null
    */
   protected function __construct()
   {
   }

   /**
    * Load file for className
    *
    * @param string $className class name
    * @return bool loaded or not
    */
   public function load(string $className): bool
   {
       if (!($fileName = $this->fileName($className))) {
           return false;
       } 
       require $fileName;
       return true;
   }

   /**
    * Register
    *
    * @return LoaderInterface self
    */
   public final function register(): LoaderInterface
   {
       spl_autoload_register([$this, "load"]);
       return $this;
   }

   /**
    * Unregister
    *
    * @return LoaderInterface self
    */
   public final function unregister(): LoaderInterface
   {
       spl_autoload_unregister([$this, "load"]);
       return $this;
   }

}
