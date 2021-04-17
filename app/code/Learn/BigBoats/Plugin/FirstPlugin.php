<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 17.03.21
 * Time: 1:09
 */

namespace Learn\BigBoats\Plugin;

class FirstPlugin
{
    public function beforeExecute(\Learn\BigBoats\Controller\Index\Index $subject)
    {
        echo "<br>" . " before execute with sort order 10 ";
    }

    public function afterExecute(\Learn\BigBoats\Controller\Index\Index $subject)
    {
        echo "<br>" . " after execute with sort order 10 ";
    }

    public function aroundExecute(
        \Learn\BigBoats\Controller\Index\Index $subject,
        callable $proceed
    ) {
        echo "<br>" . " before procced sort order 10 ";
        $proceed();
        echo "<br>" ." after procced sort order 10 ";
    }
    public function beforeSetColor(\Learn\Interactive\Model\Color $subject, $color)
    {
        return "bl" . $color;
    }

    public function afterGetColor(\Learn\Interactive\Model\Color $subject, $result)
    {
        return $result . "After Plugin";
    }

    public function aroundGetColor(
        \Learn\Interactive\Model\Color $subject,
        callable $proceed
    ) {
        echo "before proceed ";
        $color = $proceed();
        echo " " . $color;
        echo " after proceed ";
        return $color;
    }
}
