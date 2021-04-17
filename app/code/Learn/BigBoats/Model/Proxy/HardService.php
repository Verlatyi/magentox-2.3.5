<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 18.03.21
 * Time: 0:43
 */

namespace Learn\BigBoats\Model\Proxy;

//Heavy Service...
class HardService
{
    public function __construct()
    {
        echo "Hard service is instant!" . "</br>";
    }

    public function showServiceMessage()
    {
        echo "Message from Hard Service Class";
    }
}
