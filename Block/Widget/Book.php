<?php

namespace Magepow\Flipbook\Block\Widget;

use Magento\Widget\Block\BlockInterface;


class Book extends \Magepow\Flipbook\Block\Widget\Index implements BlockInterface
{
	protected $_template = "widget/index.phtml";
	
	

    public function getPdf($book)
    {
        return $this->getMediaUrl($book->getBook());

    }

}
