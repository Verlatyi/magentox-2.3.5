<?php

namespace Learn\BigBoats\Plugin;

class ThirtPlugin
{
    public function beforeExecute(\Learn\BigBoats\Controller\Index\Index $subject)
    {
        echo "<br>" . " before execute with sort order 5 ";
    }

    public function afterExecute(\Learn\BigBoats\Controller\Index\Index $subject)
    {
        echo "<br>" . " after execute with sort order 5 ";
    }

    public function aroundExecute(
        \Learn\BigBoats\Controller\Index\Index $subject,
        callable $proceed
    ) {
        echo "<br>" . " before procced sort order 5 ";
        $proceed();
        echo "<br>" ." after procced sort order 5 ";
    }
}
