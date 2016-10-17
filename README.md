## Seeren\Loader\

Load standard prefixed class or class map in a chain of responsability.

#### Code Example

Create loader, register prefix or class then register the loader.

### Seeren\Loader\UniversalLoader

Use a chain of responsability for psr and class map loaders

```php
(new UniversalLoader(new Psr4, new ClassMap))
->addPrefix("Acme\\Foo\\", "app/acme/foo/src/")
->addClass("MyClass", "app/acme/foo/my_class.php")
->register();
```

### Seeren\Loader\Psr4

```php
/**
 * @see http://www.php-fig.org/psr/psr-4/
 */

$loader = new Psr4;
$loader->addPrefix("Acme\\Foo\\", "app/acme/foo/src/");
$loader->register();
```
```php
$loader->removePrefix("Acme\\Foo\\");
```

Prefix allow string|string[] for have multiple base directory.

```php
$loader->addPrefix("Acme\\Foo\\", [
    "app/acme/foo/src/",
    "app/acme/foo/test/"]);
new \Acme\Foo\Bar;
new \Acme\Foo\BarTest;
```

### Seeren\Loader\ClassMap

Use class map loader for unnamspaced class.

```php
$loader = new ClassMap;
$loader->addClass("MyClass", "app/acme/foo/my_class.php");
```

#### Running the tests

Running tests with phpunit in the test folder.

```
$ phpunit test/Psr4Test.php
```