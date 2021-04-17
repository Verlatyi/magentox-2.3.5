<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 18.03.21
 * Time: 0:43
 */

namespace Learn\BigBoats\Model\Proxy;

//Heavy Service...
class Service
{
    public function __construct()
    {
        echo "Heavy service is instant!" . "</br>";
    }

    public function showServiceMessage()
    {
        echo "Message from Service Class";
    }
}
