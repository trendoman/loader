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
 * @version 1.0.3
 */

namespace Seeren\Loader\Test;

use Seeren\Loader\{LoaderInterface, Psr4, ClassMap};
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
       $loader = $this->getLoader();
       $loader->__construct(__DIR__);
       $loader->addPrefix("Seeren\\Loader\\", __DIR__ . "/../src");
       $this->assertTrue($loader->load(ClassMap::class)
                      || class_exists(ClassMap::class));
   }

}
