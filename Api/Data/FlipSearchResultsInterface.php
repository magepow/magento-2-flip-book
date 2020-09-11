<?php


namespace Magepow\FlipBook\Api\Data;

interface FlipSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{


    /**
     * Get flip list.
     * @return \Magepow\FlipBook\Api\Data\FlipInterface[]
     */
    
    public function getItems();

    /**
     * Set title list.
     * @param \Magepow\FlipBook\Api\Data\FlipInterface[] $items
     * @return $this
     */
    
    public function setItems(array $items);
}
