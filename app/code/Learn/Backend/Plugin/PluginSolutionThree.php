<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 08.03.21
 * Time: 23:57
 */

namespace Learn\Backend\Plugin;


class PluginSolutionThree
{
    public function beforeExecute(
        \Learn\Backend\Controller\Index\Index $subject
    ) {
        echo "before execute sort order 5"."</br>";
    }

    public function afterExecute(
        \Learn\Backend\Controller\Index\Index $subject
    ) {
        echo "after execute sort order 5"."</br>";
    }

    public function aroundExecute(
        \Learn\Backend\Controller\Index\Index $subject,
        callable $proceed
    ) {
        echo "before proceed around execute sort order 5"."</br>";
        $proceed();
        echo "after proceed around execute sort order 5"."</br>";
    }
}