<?php

/**
* This file is part of Lenius Basket for Laravel 5, a PHP
* package to provide a Service Provider and Facade for
* the Lenius\Basket package.
*
* Copyright (c) 2017 Lenius.
* http://github.com/lenius/laravel-basket
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*
* @package lenius/laravel-basket
* @author Carsten <carsten@lenius.dk>
* @copyright 2017 Lenius.
* @version production
* @link http://github.com/lenius/laravel-basket
*
*/

namespace Lenius\Basket;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Lenius\Basket\Storage\LaravelSession as SessionStore;
use Lenius\Basket\Identifier\Cookie as CookieIdentifier;

class BasketServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('basket', function() {
            return new Basket(new SessionStore, new CookieIdentifier);
        });

        // Shortcut so developers don't need to add an Alias in app/config/app.php
        //$this->app->booting(function()
        //{
        //    $loader = AliasLoader::getInstance();
        //    $loader->alias('Basket', 'Lenius\Basket\Basket');
        //});
    }
}