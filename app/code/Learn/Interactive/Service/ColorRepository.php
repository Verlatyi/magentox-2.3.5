<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 10.03.21
 * Time: 23:44
 */

namespace Learn\Interactive\Service;

use Learn\Interactive\Api\Data\ColorInterface;
use Learn\Interactive\Api\ColorRepositoryInterface;
use Learn\Interactive\Api\Data\ColorResultInterface;
use Learn\Interactive\Api\Data\ColorResultInterfaceFactory;
use Learn\Interactive\Model\ColorFactory;
use Learn\Interactive\Model\ResourceModel\Color;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

class ColorRepository implements ColorRepositoryInterface
{
    /**
     * @var Color
     */
    private $resourceModelColor;

    /**
     * @var ColorFactory
     */
    private $colorFactory;

    /**
     * @var ColorResultInterfaceFactory
     */
    private $colorResultFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * ColorRepository constructor.
     * @param Color $resourceModelColor
     * @param ColorFactory $colorFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param ColorResultInterfaceFactory $colorResultFactory
     */
    public function __construct(
        Color $resourceModelColor,
        ColorFactory $colorFactory,
        CollectionProcessorInterface $collectionProcessor,
        ColorResultInterfaceFactory $colorResultFactory
    ) {
        $this->resourceModelColor = $resourceModelColor;
        $this->colorFactory = $colorFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->colorResultFactory = $colorResultFactory;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Learn\Interactive\Api\Data\ColorResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): ColorResultInterface
    {
        $searchResult = $this->colorResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $this->collectionProcessor->process($searchCriteria, $searchResult);
        return $searchResult;
    }

    /**
     * @param int $colorId
     * @return \Learn\Interactive\Api\Data\ColorInterface
     */
    public function get(int $colorId): ColorInterface
    {
        $object = $this->colorFactory->create();
        $this->resourceModelColor->load($object, $colorId);
        return $object;
    }
}
