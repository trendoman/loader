# loader

[![Build Status](https://travis-ci.org/seeren/loader.svg?branch=master)](https://travis-ci.org/seeren/loader) [![Coverage Status](https://coveralls.io/repos/github/seeren/loader/badge.svg?branch=master)](https://coveralls.io/github/seeren/loader?branch=master) [![Packagist](https://img.shields.io/packagist/dt/seeren/loader.svg)](https://packagist.org/packages/seeren/loader/stats) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/79594fda319241f787ac5342cb0a1836)](https://www.codacy.com/app/seeren/loader?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/loader&amp;utm_campaign=Badge_Grade) [![Packagist](https://img.shields.io/packagist/v/seeren/loader.svg)](https://packagist.org/packages/seeren/loader) [![Packagist](https://img.shields.io/packagist/l/seeren/loader.svg)](LICENSE)

**Universal class loader**
> This package contain implementations of the [PSR-4 autoloader](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md)

## Features
* [Psr-0](http://www.php-fig.org/psr/psr-0/), [Psr-4](http://www.php-fig.org/psr/psr-4/) and class map loader

## Installation
Require this package with [composer](https://getcomposer.org/)
```
composer require seeren/loader dev-master
```

## Usage
#### `Seeren\Loader\Psr4`
Load prefixed classes
```php
(new Psr4)
->addPrefix("Acme\\Bar", ["acme/src/bar/"])
->register();
```

#### `Seeren\Loader\ClassMap`
Load unnamespaced classes
```php
(new ClassMap)
->addClass("Acme_Foo", "acme/AcmeFoo.php")
->register();
```

#### `Seeren\Loader\UniversalLoader`
Load from a composer file
```php
(new UniverSalLoader(new Psr4, new ClassMap))
->compose("../composer.json")
->register();
```

## Run Tests
Run [phpunit](https://phpunit.de/) with [Xdebug](https://xdebug.org/) enable and [OPcache](http://php.net/manual/fr/book.opcache.php) disable
```
./vendor/bin/phpunit
```

## Run Coverage
Run [coveralls](https://coveralls.io/)
```
./vendor/bin/php-coveralls -v
```

## License
This project is licensed under the **MIT License** - see the [license](LICENSE) file for details.