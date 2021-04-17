<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 15.03.21
 * Time: 22:45
 */

namespace Learn\Backend\Model\Interactive;

use Learn\Interactive\Api\ColorRepositoryInterface;
use Learn\Interactive\Api\Data\ColorInterface;
use Learn\Interactive\Api\Data\ColorResultInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

class Color implements ColorRepositoryInterface
{

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return ColorResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): ColorResultInterface
    {
        // TODO: Implement getList() method.
    }

    /**
     * @param int $colorId
     * @return ColorInterface
     */
    public function get(int $colorId): ColorInterface
    {
        // TODO: Implement get() method.
    }
}