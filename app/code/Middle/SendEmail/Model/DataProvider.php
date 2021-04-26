<?php

namespace Middle\SendEmail\Model;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Magento\Framework\Api\Filter;
/**
 * Class DataProvider
 */
class DataProvider extends AbstractDataProvider
{
    public function addFilter(Filter $filter)
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
