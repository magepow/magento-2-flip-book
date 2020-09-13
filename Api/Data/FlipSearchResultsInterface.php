<?php


namespace Magepow\Flipbook\Api\Data;

interface FlipSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{


    /**
     * Get flip list.
     * @return \Magepow\Flipbook\Api\Data\FlipInterface[]
     */
    
    public function getItems();

    /**
     * Set title list.
     * @param \Magepow\Flipbook\Api\Data\FlipInterface[] $items
     * @return $this
     */
    
    public function setItems(array $items);
}
