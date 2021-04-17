<?php

namespace Learn\Database\Api;

use Learn\Database\Api\Data\LearnDatabaseInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface LearnDatabaseRepositoryInterface
{
    /*Вернет весь список задач*/
    /**
     * @return LearnDatabaseInterface[]
     */
    public function getLis();

    /*Возращение по Id*/
    /**
     * @param int $id
     * @return LearnDatabaseInterface
     */
    public function getById($id);

    /*save*/
    /**
     * @param LearnDatabaseInterface $learnDatabase
     * @return LearnDatabaseInterface
     */
    public function saveLearnDatabase(LearnDatabaseInterface $learnDatabase);

    /*delete*/
    /**
     * @param int $id
     * @return LearnDatabaseInterface
     */
    public function deleteLearnDatabaseById($id);


    /* Search Criteria*/

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Learn\Database\Api\Data\LearnDatabaseSearchResultInterface
     */
    public function getSearchResultsList(SearchCriteriaInterface $searchCriteria);
}
