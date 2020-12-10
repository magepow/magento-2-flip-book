<?php

namespace Magepow\Flipbook\Block\Widget;

class Index extends \Magento\Framework\View\Element\Template
{

    protected $_flipFactory;
    protected $_urlMedia;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context, 
        \Magepow\Flipbook\Model\FlipFactory $flipFactory,
        array $data = []
    ) {
        $this->_flipFactory = $flipFactory;
        parent::__construct($context ,$data); 
    }


    public function getCollection()
    { 
    
        $data = $this->getData('flip_book');
        $flip = $this->_flipFactory->create();
        if ($data) {
            $books = $flip->getCollection()->addFieldToFilter('entity_id',$data);
        }else{
            $books = $flip->getCollection();
        }
        return $books; 
    }

    public function getBook($id)
    {
        $flip = $this->_flipFactory->create();
        $book = $flip->load($id);
        return $book;
    }
    
    public function getThumbnail($book)
    {
        $thumbUrl = $this->getMediaUrl($book->getThumbnail());
        $thumb = "<img class='top' src='".$thumbUrl."'>";
        return $thumb;

    }

    public function getMediaUrl($file)
    {
        if(!$this->_urlMedia) $this->_urlMedia = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);

        return $this->_urlMedia . $file;
    }


}
