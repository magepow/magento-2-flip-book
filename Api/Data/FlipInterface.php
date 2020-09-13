<?php


namespace Magepow\Flipbook\Api\Data;

interface FlipInterface
{

    const ENTITY_ID = 'entity_id';
    const BOOK      = 'book';
    const TITLE     = 'title';
    const AUTHOR    = 'author';

    /**
     * Get flip_id
     * @return string|null
     */
    
    public function getEntityId();

    /**
     * Set flip_id
     * @param string $flip_id
     * @return Magepow\Flipbook\Api\Data\FlipInterface
     */
    
    public function setEntityId($entityId);

    /**
     * Get title
     * @return string|null
     */
    
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return Magepow\Flipbook\Api\Data\FlipInterface
     */
    
    public function setTitle($title);

    /**
     * Get author
     * @return string|null
     */
    
    public function getAuthor();

    /**
     * Set author
     * @param string $author
     * @return Magepow\Flipbook\Api\Data\FlipInterface
     */
    
    public function setAuthor($author);

    /**
     * Get book
     * @return string|null
     */
    
    public function getBook();

    /**
     * Set book
     * @param string $book
     * @return Magepow\Flipbook\Api\Data\FlipInterface
     */
    
    public function setBook($book);
}
