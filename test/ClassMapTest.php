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
 * @version 1.1.3
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
    * {@inheritDoc}
    * @see \Seeren\Loader\Test\AbstractLoaderTest::getLoader()
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
       parent::testLoadFalse();
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\ClassMap::register
    */
   public function testRegister()
   {
       parent::testRegister();
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\ClassMap::register
    * @covers \Seeren\Loader\ClassMap::unregister
    */
   public function testUnregister()
   {
       parent::testUnregister();
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
