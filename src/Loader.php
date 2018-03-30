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
   abstract protected function fileName(string $className): string;

   /**
    * @constructor
    */
   protected function __construct()
   {
   }

   /**
    * {@inheritDoc}
    * @see \Seeren\Loader\LoaderInterface::load()
    */
   public function load(string $className): bool
   {
       if (($fileName = $this->fileName($className))) {
           require $fileName;
           return true;
       } 
       return false;
   }

   /**
    * {@inheritDoc}
    * @see \Seeren\Loader\LoaderInterface::register()
    */
   public final function register(): LoaderInterface
   {
       spl_autoload_register([$this, "load"]);
       return $this;
   }

   /**
    * {@inheritDoc}
    * @see \Seeren\Loader\LoaderInterface::unregister()
    */
   public final function unregister(): LoaderInterface
   {
       spl_autoload_unregister([$this, "load"]);
       return $this;
   }

}
