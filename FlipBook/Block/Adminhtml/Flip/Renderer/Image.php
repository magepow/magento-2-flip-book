<?php
namespace Magepow\FlipBook\Block\Adminhtml\Flip\Renderer;

class Image extends \Magento\Framework\Data\Form\Element\Image
{
    protected function _getUrl()
    {   
        $url = 'book'.$this->getValue();
        return $url;
    }
}