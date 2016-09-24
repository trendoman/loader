## Seeren\Loader\

Load standard prefixed class.
This package allows you to load classes for registred prefix and base directory. Interfaces and classes provid psr-4 implementation and require an optional include path.

### Code Example

Create loader, register prefix for base directory then register the loader.

#### Seeren\Loader\Psr4

```php
/**
 * @see http://www.php-fig.org/psr/psr-4/
 */
 
use Seeren\Loader\Psr4;

$loader = new Psr4();
$loader->addPrefix("Acme\\Foo\\", "app/acme/foo/src/");
$loader->register();
```

Include path corresponding to a root project but he can be specified in constructor.
If a composer.json exists at the root project directory, prefix will be automatically added.

```php
$loader = new Psr4("includePath");
$loader->removePrefix("Acme\\Foo\\");
```
Prefix allow string|array and can have multiple base directory.

```php

$loader->addPrefix("Acme\\Foo\\", ["app/acme/foo/src/", "app/acme/foo/test/"]);

new \Acme\Foo\Bar;
new \Acme\Foo\BarTest;
```

### Running the tests

Running tests with phpunit in the test folder.

```
$ phpunit seeren/src/loader/test/Psr4Test.php
```

### License

* [MIT](https://github.com/Seeren/Seeren/blob/master/LICENSE)
