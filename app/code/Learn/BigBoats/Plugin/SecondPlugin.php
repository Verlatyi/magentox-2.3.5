<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 17.03.21
 * Time: 1:09
 */

namespace Learn\BigBoats\Plugin;

class SecondPlugin
{
    public function beforeExecute(\Learn\BigBoats\Controller\Index\Index $subject)
    {
        echo "<br>" . " before execute with sort order 20 ";
    }

    public function afterExecute(\Learn\BigBoats\Controller\Index\Index $subject)
    {
        echo "<br>" . " after execute with sort order 20 ";
    }

    public function aroundExecute(
        \Learn\BigBoats\Controller\Index\Index $subject,
        callable $proceed
    ) {
        echo "<br>" . " before procced sort order 20 ";
        $proceed();
        echo "<br>" ." after procced sort order 20 ";
    }
}
