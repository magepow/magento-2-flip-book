<?php

namespace Magepow\Flipbook\Model;

use Magepow\Flipbook\Api\Data\FlipInterface;

class Flip extends \Magento\Framework\Model\AbstractModel implements FlipInterface
{

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magepow\Flipbook\Model\ResourceModel\Flip');
    }

    /**
     * Get flip_id
     * @return string
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set entity_id
     * @param string $entityId
     * @return Magepow\Flipbook\Api\Data\FlipInterface
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
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
     * @return Magepow\Flipbook\Api\Data\FlipInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
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
     * @return Magepow\Flipbook\Api\Data\FlipInterface
     */
    public function setAuthor($author)
    {
        return $this->setData(self::AUTHOR, $author);
    }

    /**
     * Get book
     * @return string
     */
    public function getBook()
    {
        return $this->getData(self::BOOK);
    }

    /**
     * Set book
     * @param string $book
     * @return Magepow\Flipbook\Api\Data\FlipInterface
     */
    public function setBook($book)
    {
        return $this->setData(self::BOOK, $book);
    }
}
