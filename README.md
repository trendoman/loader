# loader

[![Build Status](https://travis-ci.org/seeren/loader.svg?branch=master)](https://travis-ci.org/seeren/loader) [![Coverage Status](https://coveralls.io/repos/github/seeren/loader/badge.svg?branch=master)](https://coveralls.io/github/seeren/loader?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/loader.svg)](https://packagist.org/packages/seeren/loader/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/79594fda319241f787ac5342cb0a1836)](https://www.codacy.com/app/seeren/loader?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/loader&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/loader.svg)](https://packagist.org/packages/seeren/loader) [![Packagist](https://img.shields.io/packagist/l/seeren/loader.svg)](LICENSE)

**Universal class loader**
> This package contain implementations of the [PSR-4 autoloader](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md)

## Features
* Load [psr-0](http://www.php-fig.org/psr/psr-0/), [psr-4](http://www.php-fig.org/psr/psr-4/) and class map

## Installation
Require this package with [composer](https://getcomposer.org/)
```
composer require seeren/loader dev-master
```

## Loader Usage

#### `Seeren\Loader\Psr4`
Use Psr4 for load standard classes. If you do not use composer or if you want to provide extra classes for the script, Psr4 provide easy way to declare class that can be loaded. Use addPrefix to join a namespace prefix to a relative path based on the root project location,  addPrefix allow to add string or string collection for paths
```php
(new Psr4)
->addPrefix("Acme\\Foo", "acme/src/foo/")
->addPrefix("Acme\\Bar", [
    "acme/src/bar/",
    "acme/test/bar/"
]);
->register();
```

#### `Seeren\Loader\ClassMap`
Load non standard class like old library or some [PEAR](https://pear.php.net/) packages. You can use addClass to join a class name to a relative file base name based on the root project location
```php
(new ClassMap)
->addClass("Acme_Foo", "acme/AcmeFoo.php")
->register();
```

#### `Seeren\Loader\UniverSalLoader`
Use a [chain of responsibility](https://en.wikipedia.org/wiki/Chain-of-responsibility_pattern) for load standard and no standard class in a very performant way
```php
(new UniverSalLoader(new Psr4, new ClassMap))
->addPrefix("Acme\\Foo", "acme/src/foo/")
->addClass("Acme_Foo", "acme/AcmeFoo.php")
->register();
```
The loader can use a composer.json file to add prefixes
```php
$loader->compose("../composer.json")
->register();
```

## Run Unit tests
Install dependencies
```
composer update
```
Run [phpunit](https://phpunit.de/) with [Xdebug](https://xdebug.org/) enabled and [OPcache](http://php.net/manual/fr/book.opcache.php) disabled for coverage
```
./vendor/bin/phpunit
```
## Run Coverage
Install dependencies
```
composer update
```
Run [coveralls](https://coveralls.io/) for check coverage
```
./vendor/bin/coveralls -v
```

##  Contributors
* **Cyril Ichti** - *Initial work* - [seeren](https://github.com/seeren)

## License
This project is licensed under the **MIT License** - see the [license](LICENSE) file for details.