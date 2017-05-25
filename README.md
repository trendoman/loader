[![Codacy Badge](https://api.codacy.com/project/badge/Grade/f8c65f80ba0d47559f8122b361931c34)](https://www.codacy.com/app/seeren/loader) [![Build Status](https://travis-ci.org/seeren/loader.svg?branch=master)](https://travis-ci.org/seeren/loader) [![GitHub license](https://img.shields.io/badge/license-MIT-orange.svg)](https://raw.githubusercontent.com/seeren/loader/master/LICENSE) [![Packagist](https://img.shields.io/packagist/v/seeren/loader.svg)](https://packagist.org/packages/seeren/loader) [![Packagist](https://img.shields.io/packagist/dt/seeren/loader.svg)](https://packagist.org/packages/seeren/loader/stats)

# loader
Load psr-0, psr-4 and class map classes.

## Seeren\Loader\UniversalLoader
Use a chain of responsability for psr and class map loaders
```php
(new UniversalLoader(new Psr4, new ClassMap))
->addPrefix("Acme\\Foo\\", "app/acme/foo/src/")
->addClass("MyClass", "app/acme/foo/foo.php")
->register();
```
## Seeren\Loader\Psr4
```php
$loader = new Psr4;
$loader->addPrefix("Acme\\Foo\\", "app/acme/foo/src/");
$loader->register();
```
Prefix allow string|string[] for have multiple base directory.
```php
$loader->addPrefix("Acme\\Foo\\", [
    "app/acme/foo/src/",
    "app/acme/foo/test/"]);
```

## Seeren\Loader\ClassMap
Use class map loader for unnamspaced class.
```php
(new ClassMap)->addClass("MyClass", "app/acme/foo/foo.php");
```

## Installation
Require this package with composer
```
composer require seeren/loader dev-master
```

## Run the tests
Run with phpunit after install dependencies
```
composer update
phpunit
```

## Authors
* **Cyril Ichti** - [www.seeren.fr](http://www.seeren.fr)