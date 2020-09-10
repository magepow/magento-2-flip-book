<?php


namespace Magepow\FlipBook\Model\ResourceModel;

class Flip extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('book_flip', 'flip_id');
    }
}
