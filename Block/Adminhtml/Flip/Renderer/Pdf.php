<?php
namespace Magepow\Flipbook\Block\Adminhtml\Flip\Renderer;

use Magento\Framework\UrlInterface;
class Pdf extends \Magento\Framework\Data\Form\Element\Image
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
                '<img src="' . $this->getIcon() . '"
                id="' .
                $this->getHtmlId() .
                '_image" title="' .
                $this->_escaper->escapeHtmlAttr($this->getValue()) .
                '"' .
                ' alt="' .
                $this->_escaper->escapeHtmlAttr($this->getValue()) .
                '" height="22" width="22" class="small-image-preview v-middle"  ' .
                $this->_getUiId() .
                ' />' .
                '</a> ';
        }
        $this->setClass('input-file');
        $html .= \Magento\Framework\Data\Form\Element\AbstractElement::getElementHtml();
        $html .= $this->_getDeleteCheckbox();

        return $html;
    }

    public function getIcon()
    {
    	return "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 309.267 309.267'%3E%3Cpath d='M38.658 0h164.23l87.049 86.711v203.227c0 10.679-8.659 19.329-19.329 19.329H38.658c-10.67 0-19.329-8.65-19.329-19.329V19.329C19.329 8.65 27.989 0 38.658 0z' fill='%23e2574c'/%3E%3Cpath d='M289.658 86.981h-67.372c-10.67 0-19.329-8.659-19.329-19.329V.193l86.701 86.788z' fill='%23b53629'/%3E%3Cpath d='M217.434 146.544c3.238 0 4.823-2.822 4.823-5.557 0-2.832-1.653-5.567-4.823-5.567h-18.44c-3.605 0-5.615 2.986-5.615 6.282v45.317c0 4.04 2.3 6.282 5.412 6.282 3.093 0 5.403-2.242 5.403-6.282v-12.438h11.153c3.46 0 5.19-2.832 5.19-5.644 0-2.754-1.73-5.49-5.19-5.49h-11.153v-16.903h13.24zm-62.327-11.124h-13.492c-3.663 0-6.263 2.513-6.263 6.243v45.395c0 4.629 3.74 6.079 6.417 6.079h14.159c16.758 0 27.824-11.027 27.824-28.047-.009-17.995-10.427-29.67-28.645-29.67zm.648 46.526h-8.225v-35.334h7.413c11.221 0 16.101 7.529 16.101 17.918 0 9.723-4.794 17.416-15.289 17.416zM106.33 135.42H92.964c-3.779 0-5.886 2.493-5.886 6.282v45.317c0 4.04 2.416 6.282 5.663 6.282s5.663-2.242 5.663-6.282v-13.231h8.379c10.341 0 18.875-7.326 18.875-19.107.001-11.529-8.233-19.261-19.328-19.261zm-.222 27.738h-7.703v-17.097h7.703c4.755 0 7.78 3.711 7.78 8.553-.01 4.833-3.025 8.544-7.78 8.544z' fill='%23fff'/%3E%3C/svg%3E\"";
    }


}