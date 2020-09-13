<?php

namespace Magepow\Flipbook\Model;

use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Store\Model\StoreManagerInterface;
use Magepow\Flipbook\Api\Data\FlipSearchResultsInterfaceFactory;
use Magepow\Flipbook\Api\FlipRepositoryInterface;
use Magepow\Flipbook\Api\Data\FlipInterfaceFactory;
use Magepow\Flipbook\Model\ResourceModel\Flip as ResourceFlip;
use Magepow\Flipbook\Model\ResourceModel\Flip\CollectionFactory as FlipCollectionFactory;

class FlipRepository implements flipRepositoryInterface
{

    private $storeManager;

    protected $dataObjectProcessor;

    protected $flipCollectionFactory;

    protected $resource;

    protected $dataObjectHelper;

    protected $dataFlipFactory;

    protected $searchResultsFactory;

    protected $flipFactory;


    /**
     * @param ResourceFlip $resource
     * @param FlipFactory $flipFactory
     * @param FlipInterfaceFactory $dataFlipFactory
     * @param FlipCollectionFactory $flipCollectionFactory
     * @param FlipSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceFlip $resource,
        FlipFactory $flipFactory,
        FlipInterfaceFactory $dataFlipFactory,
        FlipCollectionFactory $flipCollectionFactory,
        FlipSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->flipFactory = $flipFactory;
        $this->flipCollectionFactory = $flipCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataFlipFactory = $dataFlipFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(\Magepow\Flipbook\Api\Data\FlipInterface $flip)
    {
        try {
            $this->resource->save($flip);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the flip: %1',
                $exception->getMessage()
            ));
        }
        return $flip;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($flipId)
    {
        $flip = $this->flipFactory->create();
        $flip->load($flipId);
        if (!$flip->getId()) {
            throw new NoSuchEntityException(__('flip with id "%1" does not exist.', $flipId));
        }
        return $flip;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $collection = $this->flipCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        $items = [];
        
        foreach ($collection as $flipModel) {
            $flipData = $this->dataFlipFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $flipData,
                $flipModel->getData(),
                'Magepow\Flipbook\Api\Data\FlipInterface'
            );
            $items[] = $this->dataObjectProcessor->buildOutputDataArray(
                $flipData,
                'Magepow\Flipbook\Api\Data\FlipInterface'
            );
        }
        $searchResults->setItems($items);
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(\Magepow\Flipbook\Api\Data\FlipInterface $flip)
    {
        try {
            $this->resource->delete($flip);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the flip: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($flipId)
    {
        return $this->delete($this->getById($flipId));
    }
}
