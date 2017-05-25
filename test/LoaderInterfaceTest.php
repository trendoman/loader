<?php

/**
 * This file contain Seeren\Loader\Test\LoaderInterfaceTest class
 *     __
 *    / /__ __ __ __ __ __
 *   / // // // // // // /
 *  /_// // // // // // /
 *    /_//_//_//_//_//_/
 *
 * @copyright (c) Cyril Ichti <consultant@seeren.fr>
 * @link http://www.seeren.fr/ Seeren
 * @version 1.0.2
 */

namespace Seeren\Loader\Test;

use Seeren\Loader\LoaderInterface;

/**
 * Class for test LoaderInterface
 * 
 * @category Seeren
 * @package Loader
 * @subpackage Test
 * @abstract
 */
abstract class LoaderInterfaceTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get LoaderInterface
    *
    * @return LoaderInterface loader
    */
   abstract protected function getLoader(): LoaderInterface;

   /**
    * Test Loader::load
    */
   public final function testLoad()
   {
       $this->assertFalse($this->getLoader()->load(""));
   }

   /**
    * Test Loader::register
    */
   public final function testRegister()
   {
       $stub = $this->getLoader();
       $nLoader = count(spl_autoload_functions());
       $stub->register();
       $this->assertTrue(1 + $nLoader  === count(spl_autoload_functions()));
   }

   /**
    * Test Loader::unregister
    */
   public final function testUnregister()
   {
       $stub = $this->getLoader();
       $stub->register();
       $nLoader = count(spl_autoload_functions());
       $stub->unregister();
       $this->assertTrue($nLoader - 1  === count(spl_autoload_functions()));
   }

}
