<?php

namespace App\Bootstrap;

use App\Interfaces\BootstrapInterface;
use Phalcon\Config;
use Phalcon\Di\Injectable;
use Phalcon\DiInterface;
use Phalcon\Mvc\Micro\Collection as RouteHandler;

/**
 * Class RouteBootstrap
 * @author Akinwunmi Taiwo <taiwo@cottacush.com>
 * @package App\Bootstrap\Bootstrap
 */
class RouteBootstrap implements BootstrapInterface
{

    public function run(Injectable $api, DiInterface $di, Config $config)
    {
        //version routes
        $router = new RouteHandler();
        $router->setHandler('App\Controller\VersionController', true);
        $router->get('/', 'index');
        $api->mount($router);

        //auth routes
        $router = new RouteHandler();
        $router->setHandler('App\Controller\AuthController', true);
        $router->setPrefix('/oauth');
        $router->post('/token', 'token');
        $router->post('/authorize', 'authorize');
        $api->mount($router);

        //authentication routes
        $router = new RouteHandler();
        $router->setHandler('App\Controller\AuthenticationController', true);
        $router->setPrefix('/authentication');
        $router->post('/authenticate', 'authenticate');
        $router->post('/register', 'register');
        $router->post('/token', 'token');
        $api->mount($router);
    }
}
