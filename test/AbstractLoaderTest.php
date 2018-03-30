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
abstract class AbstractLoaderTest extends \PHPUnit\Framework\TestCase
{

   /**
    * Get LoaderInterface
    *
    * @return LoaderInterface loader
    */
   abstract protected function getLoader(): LoaderInterface;

   /**
    * Test load
    */
   public function testLoadFalse()
   {
       $this->assertFalse($this->getLoader()->load(""));
   }

   /**
    * Test register
    */
   public function testRegister()
   {
       $mock = $this->getLoader();
       $nLoader = count(spl_autoload_functions());
       $mock->register();
       $this->assertTrue(1 + $nLoader  === count(spl_autoload_functions()));
   }

   /**
    * Test unregister
    */
   public function testUnregister()
   {
       $mock = $this->getLoader();
       $mock->register();
       $nLoader = count(spl_autoload_functions());
       $mock->unregister();
       $this->assertTrue($nLoader - 1  === count(spl_autoload_functions()));
   }

}
