<?php

namespace Learn\Interactive\Api;

use Learn\Interactive\Api\Data\ColorInterface;
use Learn\Interactive\Api\Data\ColorResultInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
/**
 * @api
 */
interface ColorRepositoryInterface
{
    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Learn\Interactive\Api\Data\ColorResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): ColorResultInterface;

    /**
     * @param int $colorId
     * @return \Learn\Interactive\Api\Data\ColorInterface
     */
    public function get(int $colorId): ColorInterface;
}
