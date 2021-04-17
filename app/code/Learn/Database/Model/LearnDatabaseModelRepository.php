<?php


namespace Learn\Database\Model;


use Learn\Database\Api\Data\LearnDatabaseInterface;
use Learn\Database\Api\LearnDatabaseRepositoryInterface;
use Learn\Database\Model\ResorceModel\LearnDatabase\CollectionFactory;
use Learn\Database\Model\LearnDatabaseFactory;
use Learn\Database\Model\ResorceModel\LearnDatabase as LearnDatabaseResource;
/*Search Criteria*/
use Magento\Framework\Api\SearchCriteriaInterface;
use Learn\Database\Api\Data\LearnDatabaseSearchResultInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;

class LearnDatabaseModelRepository implements LearnDatabaseRepositoryInterface
{
    private $resource;
    private $collection;
    private $learnDatabaseFactory;
    private $resultInterfaceFactory;
    private $collectionProcessor;
    /**
     * LearnDatabaseModelRepository constructor.
     * @param CollectionFactory $collection
     * @param \Learn\Database\Model\LearnDatabaseFactory $learnDatabaseFactory
     * @param LearnDatabaseResource $resource
     */
    public function __construct(
        CollectionFactory $collection,
        LearnDatabaseFactory $learnDatabaseFactory,
        LearnDatabaseResource $resource,
        LearnDatabaseSearchResultInterfaceFactory $resultInterfaceFactory,
        CollectionProcessor $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->collection = $collection;
        $this->learnDatabaseFactory = $learnDatabaseFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->resultInterfaceFactory = $resultInterfaceFactory;
    }

    /**
     * @return LearnDatabaseInterface[]
     */
    public function getLis()
    {
        return $this->collection->create()->getItems();
    }


    /**
     * @param int $id
     * @return LearnDatabaseInterface
     */
    public function getById($id)
    {
        $learnDatabase = $this->learnDatabaseFactory->create();
        return $learnDatabase->load($id);
    }

    /**
     * @param LearnDatabaseInterface $learnDatabase
     * @return LearnDatabaseInterface
     */
    public function saveLearnDatabase(LearnDatabaseInterface $learnDatabase)
    {
        if ($learnDatabase->getId() == null) {
            $this->resource->save($learnDatabase);
            return $learnDatabase;
        } else {
            $newObject = $this->learnDatabaseFactory->create()->load($learnDatabase->getId());
            foreach ($learnDatabase->getData() as $key => $value) {
                $newObject->setData($key, $value);
            }
            $this->resource->save($newObject);
            return $newObject;
        }
    }

    /**
     * @param int $id
     * @return LearnDatabaseInterface
     */
    public function deleteLearnDatabaseById($id)
    {
        $learn = $this->learnDatabaseFactory->create()->load($id);
        $learn->delete();
    }


    /*SEARCH CRITERIA*/
    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Learn\Database\Api\Data\LearnDatabaseSearchResultInterface
     */
    public function getSearchResultsList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->learnDatabaseFactory->create()->getCollection();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->resultInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getData());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}
