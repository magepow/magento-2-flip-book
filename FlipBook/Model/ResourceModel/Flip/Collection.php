<?php


namespace Magepow\FlipBook\Model\ResourceModel\Flip;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Magepow\FlipBook\Model\Flip',
            'Magepow\FlipBook\Model\ResourceModel\Flip'
        );
    }
}
