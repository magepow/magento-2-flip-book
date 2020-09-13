<?php


namespace Magepow\Flipbook\Model\ResourceModel;

class Flip extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('magepow_flipbook', 'entity_id');
    }
}
