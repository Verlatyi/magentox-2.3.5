<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 17.03.21
 * Time: 1:09
 */

namespace Learn\BigBoats\Plugin;

class ProductPlugin
{
    public function beforeSetName(\Magento\Catalog\Model\Product $subject, $name)
    {
        return " before plugin " . $name;
    }

    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result . " After Plugin ";
    }


}
