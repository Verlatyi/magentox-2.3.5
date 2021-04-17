<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 10.03.21
 * Time: 23:13
 */

namespace Learn\Interactive\Model\ResourceModel\Color;

use Learn\Interactive\Api\Data\ColorInterface;
use Learn\Interactive\Api\Data\ColorResultInterface;
use Learn\Interactive\Model\Color;
use Learn\Interactive\Model\ResourceModel\Color as ColorResourceModel;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection implements ColorResultInterface
{
    /**
     * @var SearchCriteriaInterface
     */
    private $searchCriteria;

    protected function _construct()
    {
        $this->_init(Color::class, ColorResourceModel::class);
    }

    /**
     * @return SearchCriteriaInterface
     */
    public function getSearchCriteria()
    {
        return $this->searchCriteria;
    }

    public function setSearchCriteria(SearchCriteriaInterface $searchCriteria = null)
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }

    public function getTotalCount()
    {
        return $this->getSize();
    }

    public function setTotalCount($totalCount)
    {
        return $this;
    }


    public function setItems(array $items = null)
    {
        if (!$items) {
            return $this;
        }
        foreach ($items as $item) {
            $this->addItem($item);
        }
        return $this;
    }
}
