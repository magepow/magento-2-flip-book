<?php

namespace Magepow\Flipbook\Model;

class Flipbook extends \Magento\Framework\Model\AbstractModel
{

    protected $_flipbookCollectionFactory;

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magepow\Flipbook\Model\ResourceModel\Flip\CollectionFactory $flipbookCollectionFactory,
        \Magepow\Flipbook\Model\ResourceModel\Flip $resource,
        \Magepow\Flipbook\Model\ResourceModel\Flip\Collection $resourceCollection
    ) {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection
        );
        $this->_flipbookCollectionFactory = $flipbookCollectionFactory;
    }

}
