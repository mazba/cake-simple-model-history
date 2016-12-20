# CakeSimpleModelHistory plugin for CakePHP		
		
## Installation		
		
You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).
		
Add the following lines to your application's `composer.json`:

```php
    "require": {
       "mazba/cake-simple-model-history": "dev-master"
    }	
```
followed by the command:
`composer update`

Or

The recommended way to install composer packages is:		
		
```php		
    composer require "mazba/cake-simple-model-history:dev-master"	
```		



## Setup

In `config/bootstrap.php` add:

```php
    Plugin::load('CakeSimpleModelHistory', ['bootstrap' => false, 'routes' => true]);
```

or using CakePHP's console:

```php
    ./bin/cake plugin load CakeSimpleModelHistory
```


## Configuration

Add the following line to your AppController:

```php
    use CakeSimpleModelHistory\Controller\ActivityLogsTrait;
```

Add the following inside your AppController Class

```php
    class AppController extends Controller
    {
        use ActivityLogsTrait;
    }
```


Finally, you'll also need to run migration on the package

```php
    cake migrations migrate -p CakeSimpleModelHistory
```


Attach the behavior in the models you want with:

```php
    public function initialize(array $config) {
        $this->addBehavior('CakeSimpleModelHistory.ActivityLogs');
    }
```

To view history : /cake-simple-model-history
-----------------
