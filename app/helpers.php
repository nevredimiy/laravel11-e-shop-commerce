<?php

use Illuminate\Support\Facades\Route;

if(! function_exists('active_link') ){
    function active_link($name, $class = 'active')
    {
        if(is_string($name)){
            $name = [$name];
        }
        return Route::is($name) ? $class : null;
    }
}