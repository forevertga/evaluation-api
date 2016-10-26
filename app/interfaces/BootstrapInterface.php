<?php

namespace App\CInterface;

use Phalcon\Config;
use Phalcon\Di\Injectable;
use Phalcon\DiInterface;
use PhalconRest\Api;

/**
 * Interface BootstrapInterface
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package App
 */
interface BootstrapInterface
{

    public function run(Injectable $app, DiInterface $di, Config $config);
}
