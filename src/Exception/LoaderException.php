<?php

/**
 * This file contain Seeren\Loader\Exception\LoaderException class
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

namespace Seeren\Loader\Exception;

use Exception;

/**
 * Class for throw loader exception
 * 
 * @category Seeren
 * @package Loader
 * @subpackage Exception
 * @final
 */
final class LoaderException extends Exception
{

   /**
    * Construct LoaderException
    * 
    * @param string $className class name
    * @return null
    */
   public final function __construct(string $className)
   {
       parent::__construct(
          "Can't load class: "
        . $className
        . " in "
        . (isset($this->getTrace()[1])
        && array_key_exists("file", $this->getTrace()[1])
        && array_key_exists("line", $this->getTrace()[1])
        ? $this->getTrace()[1]["file"]
        . " on line "
        . $this->getTrace()[1]["line"]
        : "main"),
          E_ERROR);
   }

}
