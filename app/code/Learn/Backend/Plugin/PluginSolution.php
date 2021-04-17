<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 08.03.21
 * Time: 20:56
 */

namespace Learn\Backend\Plugin;

class PluginSolution
{
    public function beforeExecute(
        \Learn\Backend\Controller\Index\Index $subject
    ) {
        echo "before execute sort order 10" . "</br>";
    }

    public function afterExecute(
        \Learn\Backend\Controller\Index\Index $subject
    ) {
        echo "after execute sort order 10" . "</br>";
    }

    public function aroundExecute(
        \Learn\Backend\Controller\Index\Index $subject,
        callable $proceed
    ) {
        echo "before proceed around execute sort order 10" . "</br>";
        $proceed();
        echo "after proceed around execute sort order 10" . "</br>";
    }

    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $name
     * @return string
     */
    /*    public function beforeSetName(\Magento\Catalog\Model\Product $subject, $name)
        {
            return "Before plugin " . $name;
        }*/

    /**
     * @param \Magento\Catalog\Model\Product $subject
     * @param $result
     * @return string
     */
    /*    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result) {
            return $result . " After plugin";
        }*/
/*
    public function aroundGetIdBySku(
        \Magento\Catalog\Model\Product $subject, callable $proceed, $sku
    )
    {
        echo "before proceed"."</br>";
        $id = $proceed($sku);
        echo $id."</br>";
        echo "after proceed"."</br>";
        return $id;
    }

    public function aroundGetName(\Magento\Catalog\Model\Product $subject, callable $proceed)
    {
        echo "before proceed"."</br>";
        $name = $proceed();
        echo $name."</br>";
        echo "after proceed"."</br>";
        return $name;
    }*/
}
