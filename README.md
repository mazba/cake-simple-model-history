# CakeSimpleModelHistory plugin for CakePHP		
		
## Installation		
		
You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).
		
Add the following lines to your application's `composer.json`:

```
    "require": {
       "mazba/cake-simple-model-history": "dev-master"
    }	
```
followed by the command:
`composer update`

Or

The recommended way to install composer packages is:		
		
```		
    composer require "mazba/cake-simple-model-history": "dev-master"	
```		



## Setup

In `config/bootstrap.php` add:

```php
    Plugin::load('CakeSimpleModelHistory', ['bootstrap' => false, 'routes' => true]);
```

or using CakePHP's console:

```
    ./bin/cake plugin load CakeSimpleModelHistory
```


## Configuration

Add the following line to your AppController:

```
    use CakeSimpleModelHistory\Controller\ActivityLogsTrait;
```

Add the following inside your AppController Class

```
    class AppController extends Controller
    {
        use ActivityLogsTrait;
    }
```


Attach the behavior in the models you want with:

```
    public function initialize(array $config) {
        $this->addBehavior('CakeSimpleModelHistory.ActivityLogs');
    }
```

# cake-simple-model-history		
CakePHP 3 Simple Model History is the history management tools for tracking database records changes