<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Hz\SampleForm\Model;

/**
 * Class DataProvider
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        return null;
    }
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return [];
    }
}
