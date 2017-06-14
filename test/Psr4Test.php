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
 * @link https://github.com/seeren/loader
 * @version 1.1.3
 */

namespace Seeren\Loader\Test;

use Seeren\Loader\LoaderInterface;
use Seeren\Loader\Psr4;
use Foo\Bar\Psr4Foo;
use Foo\Bar\Psr4Bar;

use ReflectionClass;

/**
 * Class for test Psr4
 * 
 * @category Seeren
 * @package Loader
 * @subpackage Test
 */
class Psr4Test extends AbstractLoaderTest
{

   /**
    * Get LoaderInterface
    *
    * @return LoaderInterface loader
    */
   protected final function getLoader(): LoaderInterface
   {
       return (new ReflectionClass(Psr4::class))->newInstanceArgs([]);
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\Psr4::load
    * @covers \Seeren\Loader\Psr4::fileName
    */
   public function testLoadFalse()
   {
       parent::testLoadFalse();
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\Psr4::register
    */
   public function testRegister()
   {
       parent::testRegister();
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\Psr4::register
    * @covers \Seeren\Loader\Psr4::unregister
    */
   public function testUnregister()
   {
       parent::testUnregister();
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\Psr4::addPrefix
    * @covers \Seeren\Loader\Psr4::load
    * @covers \Seeren\Loader\Psr4::fileName
    * @covers \Seeren\Loader\Psr4::find
    * @covers \Seeren\Loader\Psr4::parseBaseDirectory
    * @covers \Seeren\Loader\Psr4::parseFileName
    * @covers \Seeren\Loader\Psr4::parsePrefix
    */
   public function testAddPrefix()
   {
       $loader = $this->getLoader();
       $loader->__construct();
       $loader->addPrefix("Foo\\Bar\\", "./test/mock");
       $this->assertTrue($loader->load(Psr4Foo::class));
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\Psr4::addPrefix
    * @covers \Seeren\Loader\Psr4::load
    * @covers \Seeren\Loader\Psr4::fileName
    * @covers \Seeren\Loader\Psr4::find
    * @covers \Seeren\Loader\Psr4::parseBaseDirectory
    * @covers \Seeren\Loader\Psr4::parseFileName
    * @covers \Seeren\Loader\Psr4::parsePrefix
    */
   public function testAddPrefixWithMultiBaseDirectory()
   {
       $loader = $this->getLoader();
       $loader->__construct();
       $loader->addPrefix("Foo\\Bar\\", [
           "./test/fake",
           "./test/mock",
           
       ]);
       $this->assertTrue($loader->load(Psr4Bar::class));
   }

   /**
    * @covers \Seeren\Loader\Loader::__construct
    * @covers \Seeren\Loader\Psr4::__construct
    * @covers \Seeren\Loader\Psr4::addPrefix
    * @covers \Seeren\Loader\Psr4::parsePrefix
    * @covers \Seeren\Loader\Psr4::removePrefix
    * @covers \Seeren\Loader\Psr4::load
    * @covers \Seeren\Loader\Psr4::parseBaseDirectory
    * @covers \Seeren\Loader\Psr4::fileName
    */
   public function testRemovePrefix()
   {
       $loader = $this->getLoader();
       $loader->__construct();
       $loader->addPrefix("Foo\\Bar\\", "./test/mock");
       $loader->removePrefix("Foo\\Bar\\");
       $this->assertFalse($loader->load(Psr4Foo::class));
   }

}
