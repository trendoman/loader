<?php

/**
 * This file contain Seeren\Loader\Test\UniversalLoaderTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link https://github.com/seeren/loader
 * @version 1.0.2
 */

namespace Seeren\Loader\Test;

use Seeren\Loader\LoaderInterface;
use Seeren\Loader\UniversalLoader;
use Seeren\Loader\Psr4;
use Seeren\Loader\ClassMap;
use Foo\Bar\UniversalLoaderFoo;
use ReflectionClass;

/**
 * Class for test UniversalLoader
 * 
 * @category Seeren
 * @package Loader
 * @subpackage Test
 */
class UniversalLoaderTest extends AbstractLoaderTest
{

   /**
    * Get LoaderInterface
    *
    * @return LoaderInterface loader
    */
   protected final function getLoader(): LoaderInterface
   {
       return (new ReflectionClass(UniversalLoader::class))
       ->newInstanceArgs([
           (new ReflectionClass(Psr4::class))->newInstanceArgs([]),
           (new ReflectionClass(ClassMap::class))->newInstanceArgs([])
       ]);
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\UniversalLoader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\Loader::load
    * @covers \Seeren\Loader\UniversalLoader::load
    * @covers \Seeren\Loader\UniversalLoader::fileName
    * @covers \Seeren\Loader\Psr4::fileName
    * @covers \Seeren\Loader\ClassMap::fileName
    */
   public function testLoadFalse()
   {
       parent::testLoadFalse();
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\UniversalLoader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\UniversalLoader::register
    */
   public function testRegister()
   {
       parent::testRegister();
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\UniversalLoader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\UniversalLoader::register
    * @covers \Seeren\Loader\UniversalLoader::unregister
    */
   public function testUnregister()
   {
       parent::testUnregister();
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\UniversalLoader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\UniversalLoader::addPrefix
    * @covers \Seeren\Loader\Psr4::addPrefix
    * @covers \Seeren\Loader\Loader::load
    * @covers \Seeren\Loader\UniversalLoader::load
    * @covers \Seeren\Loader\UniversalLoader::fileName
    * @covers \Seeren\Loader\Psr4::fileName
    * @covers \Seeren\Loader\Psr4::find
    * @covers \Seeren\Loader\Psr4::parseBaseDirectory
    * @covers \Seeren\Loader\Psr4::parseFileName
    * @covers \Seeren\Loader\Psr4::parsePrefix
    */
   public function testAddPrefix()
   {
       $loader = $this->getLoader();
       $loader->addPrefix("Foo\\Bar\\", "./test/mock");
       $this->assertTrue($loader->load(UniversalLoaderFoo::class));
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\UniversalLoader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\UniversalLoader::compose
    * @covers \Seeren\Loader\UniversalLoader::addPrefix
    * @covers \Seeren\Loader\Psr4::addPrefix
    * @covers \Seeren\Loader\Psr4::parsePrefix
    * @covers \Seeren\Loader\UniversalLoader::removePrefix
    * @covers \Seeren\Loader\Psr4::removePrefix
    * @covers \Seeren\Loader\UniversalLoader::load
    * @covers \Seeren\Loader\Psr4::load
    * @covers \Seeren\Loader\Psr4::parseBaseDirectory
    * @covers \Seeren\Loader\UniversalLoader::fileName
    * @covers \Seeren\Loader\ClassMap::fileName
    * @covers \Seeren\Loader\Psr4::fileName
    */
   public function testRemovePrefix()
   {
       $loader = $this->getLoader();
       $loader->compose("./test/psr4.json");
       $loader->removePrefix("Foo\\Bar\\");
       $this->assertFalse($loader->load(UniversalLoaderFoo::class));
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\UniversalLoader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\UniversalLoader::addClass
    * @covers \Seeren\Loader\ClassMap::addClass
    * @covers \Seeren\Loader\UniversalLoader::load
    * @covers \Seeren\Loader\ClassMap::load
    * @covers \Seeren\Loader\UniversalLoader::fileName
    * @covers \Seeren\Loader\ClassMap::fileName
    * @covers \Seeren\Loader\Psr4::fileName
    * @covers \Seeren\Loader\ClassMap::removeClass
    */
   public function testAddClass()
   {
       $loader = $this->getLoader();
       $loader->addClass(
           "UniversalLoaderBar",
           "./test/mock/UniversalLoaderBar.php");
       $this->assertTrue($loader->load("UniversalLoaderBar"));
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\UniversalLoader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\ClassMap::__construct
    * @covers \Seeren\Loader\UniversalLoader::addClass
    * @covers \Seeren\Loader\ClassMap::addClass
    * @covers \Seeren\Loader\UniversalLoader::load
    * @covers \Seeren\Loader\ClassMap::load
    * @covers \Seeren\Loader\UniversalLoader::fileName
    * @covers \Seeren\Loader\ClassMap::fileName
    * @covers \Seeren\Loader\Psr4::fileName
    * @covers \Seeren\Loader\UniversalLoader::removeClass
    * @covers \Seeren\Loader\ClassMap::removeClass
    */
   public function testRemoveClass()
   {
       $loader = $this->getLoader();
       $loader->addClass(
           "UniversalLoaderBar",
           "./test/mock/UniversalLoaderBar.php");
       $loader->removeClass("UniversalLoaderBar");
       $this->assertFalse($loader->load("UniversalLoaderBar"));
   }

}
