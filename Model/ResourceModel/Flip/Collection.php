<?php


namespace Magepow\Flipbook\Model\ResourceModel\Flip;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'Magepow\Flipbook\Model\Flip',
            'Magepow\Flipbook\Model\ResourceModel\Flip'
        );
    }
}
 