<?php

namespace Magepow\FlipBook\Block\Index;

use Magepow\FlipBook\Model\FlipFactory;
use Magento\Framework\ObjectManagerInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Store\Model\StoreManagerInterface;

class Index extends \Magento\Framework\View\Element\Template
{

	protected $_flipModel;
    private $_objectManager;
    protected $_storeManager;

    protected $_urlMedia;

	public function __construct(
        Context $context,
        FlipFactory $flipModel,
        DirectoryList $directoryList,
        ObjectManagerInterface $objectmanager,
        StoreManagerInterface $storeManager
        
    ) {
        $this->_flipModel = $flipModel;
        $this->_objectManager = $objectmanager;
        $this->directory_list = $directoryList;
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }


    public function getCollection()
    {
        $collection = $this->_flipModel->create();
        $items = $collection->getCollection();
        return $items;
    }

    public function getBook($id)
    {
        $collection = $this->_flipModel->create();
        $book = $collection->load($id);
        return $book;
    }

    public function getBookDir(){
    	return $this->directory_list->getPath('media').'/book';
    }

    public function getBookPath($folder){
    	return $this->getMediaUrl($folder);
    }

    public function getUploadDir($book)
    {
    	$uploadDir = substr($book->getUpload(), 0, -4);
    	return $uploadDir;
    }

    public function getThumbnail($book)
    {
        $media = $this ->_storeManager-> getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA );
        $thumbUrl = $media.'book'.$book->getThumbnail();
        $thumb = "<img class='top' src='".$thumbUrl."'>";
        return $thumb;

    }

    public function getMediaUrl($file)
    {
        if(!$this->_urlMedia) $this->_urlMedia = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);

        return $this->_urlMedia .'book'. $file;
    }

    public function getConfig($value)
    {
		$config = $this->_objectManager->
		get('Magento\Framework\App\Config\ScopeConfigInterface')->getValue($value);
    	return $config;
    }


}
