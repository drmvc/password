<?php
require_once __DIR__ . '/../vendor/autoload.php';

$obj = new \DrMVC\Password();

// Generate hash from string
$hash = $obj->make('some_pass');
var_dump($hash);

// Get info about current hash
$info = $obj->info($hash);
var_dump($info);

// Verify if password is valid
$verify1 = $obj->verify('some_pass', $hash); // true
var_dump($verify1);
$verify2 = $obj->verify('other_pass', $hash); // false
var_dump($verify2);

// Check if rehashing is required
$rehash = $obj->rehash($hash); // false
var_dump($rehash);
