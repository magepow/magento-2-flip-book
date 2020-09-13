<?php
namespace Magepow\Flipbook\Block\Adminhtml\Flip\Renderer;

use Magento\Framework\UrlInterface;
class Extra extends \Magento\Framework\Data\Form\Element\Image
{
    public function getElementHtml()
    {
        $html = '';

        if ((string)$this->getValue()) {
            $url = $this->_getUrl();

            if (!preg_match("/^http\:\/\/|https\:\/\//", $url)) {
                $url = $this->_urlBuilder->getBaseUrl(['_type' => UrlInterface::URL_TYPE_MEDIA]) . $url;
            }
            $url = $this->_escaper->escapeUrl($url);

            $html = '<a href="' .
                $url .
                '"' .
                ' onclick="imagePreview(\'' .
                $this->getHtmlId() .
                '_image\'); return false;" ' .
                $this->_getUiId(
                    'link'
                ) .
                '>' .
				$this->_escaper->escapeHtmlAttr($this->getValue())
                 .
                '</a> ';
        }
        $this->setClass('input-file');
        $html .= \Magento\Framework\Data\Form\Element\AbstractElement::getElementHtml();
        $html .= $this->_getDeleteCheckbox();

        return $html;
    }
}