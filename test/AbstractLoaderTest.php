<?php

/**
 * This file contain Seeren\Loader\Test\AbstractLoaderTest class
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
    * Assert load
    */
   protected function assertLoadFalse()
   {
       $this->assertFalse($this->getLoader()->load(""));
   }

   /**
    * Assert register
    */
   protected function assertRegister()
   {
       $mock = $this->getLoader();
       $nLoader = count(spl_autoload_functions());
       $mock->register();
       $this->assertTrue(1 + $nLoader  === count(spl_autoload_functions()));
   }

   /**
    * Assert unregister
    */
   protected function assertUnregister()
   {
       $mock = $this->getLoader();
       $mock->register();
       $nLoader = count(spl_autoload_functions());
       $mock->unregister();
       $this->assertTrue($nLoader - 1  === count(spl_autoload_functions()));
   }

}
