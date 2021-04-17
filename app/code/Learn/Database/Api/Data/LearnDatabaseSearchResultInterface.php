<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 23.03.21
 * Time: 0:57
 */

namespace Learn\Database\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/* Search Criteria*/
/**
 * @api
 */
interface LearnDatabaseSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \Magento\Framework\Api\ExtensibleDataInterface[]
     */
    public function getItems();

    /**
     * @param array $items
     * @return SearchResultsInterface
     */
    public function setItems(array $items);
}
