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
 * @version 1.0.1
 */

namespace Seeren\Loader;

/**
 * Class for psr-4 loading
 * 
 * @category Seeren
 * @package Loader
 * @see http://www.php-fig.org/psr/psr-4/
 */
class Psr4 extends Loader implements Psr4Interface, LoaderInterface
{

    private
        /**
         * @var array
         */
        $prefix;

    /**
     * @constructor
     */
    public final function __construct()
    {
        parent::__construct();
        $this->prefix = [];
    }

    /**
     * @param string $prefix namespace prefix
     * @return string parsed prefix
     */
    private final function parsePrefix(string $prefix): string
    {
        return rtrim($prefix, "\\") . "\\";
    }

    /**
     * @param string $baseDirectory base directory
     * @return string parsed base directory
     */
    private final function parseBaseDirectory(string $baseDirectory): string
    {
        return trim($baseDirectory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    /**
     * @param string $baseDirectory base directory
     * @param string $relativeClass namespace relative class
     * @return string parsed file name
     */
    private final function parseFileName(
        string $baseDirectory,
        string $relativeClass): string
    {
        return str_replace("\\", DIRECTORY_SEPARATOR,$baseDirectory
                                                   . $relativeClass
                                                   . ".php");
    }

    /**
     * @param string $prefix namespace prefix
     * @param string $relativeClass namespace relative class
     * @return string file name
     */
    private final function find(string $prefix, string $relativeClass): string
    {
       foreach ($this->prefix[$prefix] as $value) {
           $fileName = $this->parseFileName($value, $relativeClass);
           if (is_file($fileName)) {
               break;
           }
           $fileName = "";
       }
       return $fileName;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Loader\Loader::fileName()
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
     * {@inheritDoc}
     * @see \Seeren\Loader\Psr4Interface::addPrefix()
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
                $this->prefix[$parsedPrefix] = $baseDirectory;
            } else if (is_string($baseDirectory)){
                $this->prefix[$parsedPrefix] = [
                    $this->parseBaseDirectory($baseDirectory)
                ];
            }
        }
        return $this;
    }

    /**
     * {@inheritDoc}
     * @see \Seeren\Loader\Psr4Interface::removePrefix()
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
