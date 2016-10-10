<?php

/**
 * This file contain Seeren\Loader\Psr4 class
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

namespace Seeren\Loader;

/**
 * Class for psr-4 loading
 * 
 * @category Seeren
 * @package Loader
 * @see http://www.php-fig.org/psr/psr-4/
 * @final
 */
final class Psr4 extends Loader implements
    Psr4Interface,
    LoaderInterface
{

    private
        /**
         * @var array prefix collection
         */
        $prefix;

    /**
     * Construct Psr4
     * 
     * @return null
     */
    public final function __construct()
    {
        parent::__construct();
        $this->prefix = [];
    }

    /**
     * Parse prefix
     * 
     * @param string $prefix namespace prefix
     * @return string parsed prefix
     */
    private final function parsePrefix(string $prefix): string
    {
        return rtrim($prefix, "\\") . "\\";
    }

    /**
     * Parse base directory
     *
     * @param string $baseDirectory base directory
     * @return string parsed base directory
     */
    private final function parseBaseDirectory(string $baseDirectory): string
    {
        return trim($baseDirectory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    /**
     * Parse file name
     *
     * @param string $baseDirectory base directory
     * @param string $relativeClass namespace relative class
     * @return string parsed file name
     */
    private final function parseFileName(
        string $baseDirectory,
        string $relativeClass): string
    {
        return str_replace(
                "\\",
                DIRECTORY_SEPARATOR,
                $baseDirectory
              . $relativeClass
              . ".php");
    }

    /**
     * Find file name
     *
     * @param string $prefix namespace prefix
     * @param string $relativeClass namespace relative class
     * @return string file name
     */
    private final function find(string $prefix, string $relativeClass): string
    {
       foreach ($this->prefix[$prefix] as &$value) {
           $fileName = $this->parseFileName($value, $relativeClass);
           if (is_file($fileName)) {
               break;
           }
           $fileName = "";
       }
       return $fileName;
    }

    /**
     * Template method Get file name
     *
     * @param string $className class name
     * @return string file name
     */
    protected final function fileName(string $className): string
    {
        $fileName = "";
        $prefix = $className;
        while (($lastPrPos = strrpos($prefix, "\\"))) {
            $prefix = substr($className, 0, $lastPrPos + 1);
            $relativeClass = substr($className, $lastPrPos + 1);
            if (array_key_exists($prefix, $this->prefix)
             && ($fileName = $this->find($prefix, $relativeClass))) {
                break;
            }
            $prefix = rtrim($prefix, "\\");
        }
        return $fileName;
    }

    /**
     * Add prefix
     *
     * @param string $prefix namespace prefix
     * @param string|array $baseDirectory base directory
     * @return LoaderInterface static
     */
    public final function addPrefix(
        string $prefix,
        $baseDirectory): LoaderInterface
    {
        $parsedPrefix = $this->parsePrefix($prefix);
        if (!array_key_exists($parsedPrefix, $this->prefix)) {
            if (is_array($baseDirectory)) {
                foreach ($baseDirectory as &$value) {
                    $value = $this->parseBaseDirectory((string) $value);
                }
            } else {
                $baseDirectory = [
                    $this->parseBaseDirectory((string) $baseDirectory)
                ];
            }
            $this->prefix[$parsedPrefix] = $baseDirectory;
        }
        return $this;
    }

    /**
     * Remove prefix
     *
     * @param string $prefixe namespace prefix
     * @return LoaderInterface static
     */
    public final function removePrefix(string $prefix): LoaderInterface
    {
        $parsedPrefix = $this->parsePrefix($prefix);
        if (array_key_exists($parsedPrefix, $this->prefix)) {
            unset($this->prefix[$parsedPrefix]);
        }
        return $this;
    }

}
