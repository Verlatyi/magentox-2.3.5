<?php

namespace MageMastery\Todo\Api;

use MageMastery\Todo\Api\Data\TaskSearchResultInterface;
use MageMastery\Todo\Api\Data\TaskInterface;
use Magento\Framework\Api\SearchCriteriaInterface;


/**
 * @api
 */
interface TaskRepositoryInterface
{
    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return TaskSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): TaskSearchResultInterface;

    /**
     * @param int $taskId
     * @return TaskInterface
     */
    public function get(int $taskId) : TaskInterface;
}
