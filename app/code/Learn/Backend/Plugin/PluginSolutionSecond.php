<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 08.03.21
 * Time: 23:46
 */

namespace Learn\Backend\Plugin;

class PluginSolutionSecond
{
    public function beforeExecute(
        \Learn\Backend\Controller\Index\Index $subject
    ) {
        echo "before execute sort order 20"."</br>";
    }

    public function afterExecute(
        \Learn\Backend\Controller\Index\Index $subject
    ) {
        echo "after execute sort order 20"."</br>";
    }

    public function aroundExecute(
        \Learn\Backend\Controller\Index\Index $subject,
        callable $proceed
    ) {
        echo "before proceed around execute sort order 20"."</br>";
        $proceed();
        echo "after proceed around execute sort order 20"."</br>";
    }
}
