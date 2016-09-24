<?php

/**
 * This file contain Seeren\Loader\Test\Psr4Test class
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

namespace Seeren\Loader\Test;

use Seeren\Loader\{LoaderInterface, Psr4};
use ReflectionClass;

/**
 * Class for test Psr4
 * 
 * @category Seeren
 * @package Loader
 * @subpackage Test
 * @final
 */
final class Psr4Test extends LoaderInterfaceTest
{

   /**
    * Get LoaderInterface
    *
    * @return LoaderInterface loader
    */
   protected final function getLoader(): LoaderInterface
   {
       return (new ReflectionClass(Psr4::class))->newInstanceArgs([""]);
   }

   /**
    * Test Psr4::fileName
    */
   public final function testFileName()
   {
      $stub = (new ReflectionClass(Psr4::class))
              ->newInstanceArgs([__DIR__ . "/../"]);
       $stub->addPrefix("Seeren\\Loader\\", "src");
       $stub->addPrefix("Seeren\\Loader\\Test\\", "test");
       $this->assertTrue(
           "" !== $stub->fileName(Psr4::class)
        && "" !== $stub->fileName(self::class)
       );
   }

}
