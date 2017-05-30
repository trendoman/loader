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
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.1
 */

namespace Seeren\Loader\Test;

use Seeren\Loader\LoaderInterface;
use Seeren\Loader\Psr4;
use Foo\Bar\Psr4Foo;
use Foo\Bar\Psr4Bar;
use ReflectionClass;
use Seeren\Loader\ClassMap;

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
       return (new ReflectionClass(ClassMap::class))->newInstanceArgs([""]);
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

//    /**
//     * @covers \Seeren\Loader\Loader::__construct
//     * @covers \Seeren\Loader\Psr4::__construct
//     * @covers \Seeren\Loader\Psr4::addPrefix
//     * @covers \Seeren\Loader\Psr4::load
//     * @covers \Seeren\Loader\Psr4::fileName
//     * @covers \Seeren\Loader\Psr4::find
//     * @covers \Seeren\Loader\Psr4::parseBaseDirectory
//     * @covers \Seeren\Loader\Psr4::parseFileName
//     * @covers \Seeren\Loader\Psr4::parsePrefix
//     */
//    public function testAddPrefix()
//    {
//        $loader = $this->getLoader();
//        $loader->__construct(__DIR__);
//        $loader->addPrefix("Foo\\Bar\\", __DIR__ . "/mock");
//        $this->assertTrue($loader->load(Psr4Foo::class));
//    }

//    /**
//     * @covers \Seeren\Loader\Loader::__construct
//     * @covers \Seeren\Loader\Psr4::__construct
//     * @covers \Seeren\Loader\Psr4::addPrefix
//     * @covers \Seeren\Loader\Psr4::load
//     * @covers \Seeren\Loader\Psr4::fileName
//     * @covers \Seeren\Loader\Psr4::find
//     * @covers \Seeren\Loader\Psr4::parseBaseDirectory
//     * @covers \Seeren\Loader\Psr4::parseFileName
//     * @covers \Seeren\Loader\Psr4::parsePrefix
//     */
//    public function testAddPrefixWithMultiBaseDirectory()
//    {
//        $loader = $this->getLoader();
//        $loader->__construct(__DIR__);
//        $loader->addPrefix("Foo\\Bar\\", [
//            __DIR__ . "/fake",
//            __DIR__ . "/mock",
           
//        ]);
//        $this->assertTrue($loader->load(Psr4Bar::class));
//    }

//    /**
//     * @covers \Seeren\Loader\Loader::__construct
//     * @covers \Seeren\Loader\Psr4::__construct
//     * @covers \Seeren\Loader\Psr4::addPrefix
//     * @covers \Seeren\Loader\Psr4::parsePrefix
//     * @covers \Seeren\Loader\Psr4::removePrefix
//     * @covers \Seeren\Loader\Psr4::load
//     * @covers \Seeren\Loader\Psr4::parseBaseDirectory
//     * @covers \Seeren\Loader\Psr4::fileName
//     */
//    public function testRemovePrefix()
//    {
//        $loader = $this->getLoader();
//        $loader->__construct(__DIR__);
//        $loader->addPrefix("Foo\\Bar\\", __DIR__ . "/mock");
//        $loader->removePrefix("Foo\\Bar\\");
//        $this->assertFalse($loader->load(Psr4Foo::class));
//    }

}
