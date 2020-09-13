<?php


namespace Magepow\Flipbook\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface FlipRepositoryInterface
{


    /**
     * Save flip
     * @param \Magepow\Flipbook\Api\Data\FlipInterface $flip
     * @return \Magepow\Flipbook\Api\Data\FlipInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function save(\Magepow\Flipbook\Api\Data\FlipInterface $flip);

    /**
     * Retrieve flip
     * @param string $flipId
     * @return \Magepow\Flipbook\Api\Data\FlipInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getById($flipId);

    /**
     * Retrieve flip matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magepow\Flipbook\Api\Data\FlipSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete flip
     * @param \Magepow\Flipbook\Api\Data\FlipInterface $flip
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function delete(\Magepow\Flipbook\Api\Data\FlipInterface $flip);

    /**
     * Delete flip by ID
     * @param string $flipId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    
    public function deleteById($flipId);
}
