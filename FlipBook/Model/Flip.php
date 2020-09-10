<?php

namespace Magepow\FlipBook\Model;

use Magepow\FlipBook\Api\Data\FlipInterface;

class Flip extends \Magento\Framework\Model\AbstractModel implements FlipInterface
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magepow\FlipBook\Model\ResourceModel\Flip');
    }

    /**
     * Get flip_id
     * @return string
     */
    public function getFlipId()
    {
        return $this->getData(self::FLIP_ID);
    }

    /**
     * Set flip_id
     * @param string $flipId
     * @return Magepow\FlipBook\Api\Data\FlipInterface
     */
    public function setFlipId($flipId)
    {
        return $this->setData(self::FLIP_ID, $flipId);
    }

    /**
     * Get title
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Set title
     * @param string $title
     * @return Magepow\FlipBook\Api\Data\FlipInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Get category
     * @return string
     */
    public function getCategory()
    {
        return $this->getData(self::CATEGORY);
    }

    /**
     * Set category
     * @param string $category
     * @return Magepow\FlipBook\Api\Data\FlipInterface
     */
    public function setCategory($category)
    {
        return $this->setData(self::CATEGORY, $category);
    }

    /**
     * Get author
     * @return string
     */
    public function getAuthor()
    {
        return $this->getData(self::AUTHOR);
    }

    /**
     * Set author
     * @param string $author
     * @return Magepow\FlipBook\Api\Data\FlipInterface
     */
    public function setAuthor($author)
    {
        return $this->setData(self::AUTHOR, $author);
    }

    /**
     * Get upload
     * @return string
     */
    public function getUpload()
    {
        return $this->getData(self::UPLOAD);
    }

    /**
     * Set upload
     * @param string $upload
     * @return Magepow\FlipBook\Api\Data\FlipInterface
     */
    public function setUpload($upload)
    {
        return $this->setData(self::UPLOAD, $upload);
    }
}
