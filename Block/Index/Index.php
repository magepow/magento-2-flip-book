<?php

namespace Magepow\Flipbook\Block\Index;

class Index extends \Magento\Framework\View\Element\Template
{

	protected $_flipFactory;
    protected $_urlMedia;

	public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magepow\Flipbook\Model\FlipFactory $flipFactory
        
    ) {
        $this->_flipFactory = $flipFactory;
        parent::__construct($context);
    }


    public function getCollection()
    {
        $flip = $this->_flipFactory->create();
        $books = $flip->getCollection();
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
