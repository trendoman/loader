<?php

/**
 * This file contain Seeren\Loader\Test\ClassMapTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/loader
 * @version 1.1.2
 */

namespace Seeren\Loader\Test;

use Seeren\Loader\LoaderInterface;
use Seeren\Loader\ClassMap;
use ReflectionClass;

/**
 * Class for test ClassMap
 * 
 * @category Seeren
 * @package Loader
 * @subpackage Test
 */
class ClassMapTest extends AbstractLoaderTest
{

   /**
    * Get LoaderInterface
    *
    * @return LoaderInterface loader
    */
   protected final function getLoader(): LoaderInterface
   {
       return (new ReflectionClass(ClassMap::class))->newInstanceArgs([]);
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\ClassMap::load
    * @covers \Seeren\Loader\ClassMap::fileName
    */
   public function testLoadFalse()
   {
       parent::assertLoadFalse();
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\ClassMap::register
    */
   public function testRegister()
   {
       parent::assertRegister();
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\ClassMap::register
    * @covers \Seeren\Loader\ClassMap::unregister
    */
   public function testUnregister()
   {
       parent::assertUnregister();
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\ClassMap::addClass
    * @covers \Seeren\Loader\ClassMap::load
    * @covers \Seeren\Loader\ClassMap::fileName
    * @covers \Seeren\Loader\ClassMap::removeClass
    */
   public function testAddAndRemoveClass()
   {
       $loader = $this->getLoader();
       $loader->addClass("ClassMapFoo", "./test/mock/ClassMapFoo.php");
       $this->assertTrue($loader->load("ClassMapFoo"));
   }

}
