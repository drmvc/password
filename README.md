[![Latest Stable Version](https://poser.pugx.org/drmvc/password/v/stable)](https://packagist.org/packages/drmvc/password)
[![Build Status](https://travis-ci.org/drmvc/password.svg?branch=master)](https://travis-ci.org/drmvc/password)
[![Total Downloads](https://poser.pugx.org/drmvc/password/downloads)](https://packagist.org/packages/drmvc/password)
[![License](https://poser.pugx.org/drmvc/password/license)](https://packagist.org/packages/drmvc/password)
[![PHP 7 ready](https://php7ready.timesplinter.ch/drmvc/password/master/badge.svg)](https://travis-ci.org/drmvc/password)
[![Code Climate](https://codeclimate.com/github/drmvc/password/badges/gpa.svg)](https://codeclimate.com/github/drmvc/password)
[![Scrutinizer CQ](https://scrutinizer-ci.com/g/drmvc/password/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/drmvc/password/)

# DrMVC\Password

A small wrapper library for working with password hashes.

    composer require drmvc/password

## How to use

More examples you can find [here](extra).

```php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

$obj = new \DrMVC\Password();

// Generate hash from string
$hash = $obj->make('some_pass');

// Get info about current hash
$info = $obj->info($hash);

// Verify if password is valid
$verify1 = $obj->verify('some_pass', $hash); // true
$verify2 = $obj->verify('other_pass', $hash); // false

// Check if rehashing is required
$rehash = $obj->rehash($hash); // false
```

## About PHP Unit Tests

First need to install all dev dependencies via `composer update`, then
you can run tests by hands from source directory via `./vendor/bin/phpunit` command.

# Links

* [DrMVC Framework](https://drmvc.com)
