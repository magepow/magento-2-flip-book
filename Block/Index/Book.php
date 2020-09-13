<?php

namespace Magepow\Flipbook\Block\Index;

class Book extends \Magepow\Flipbook\Block\Index\Index
{
    public function getPdf($book)
    {
        return $this->getMediaUrl($book->getBook());

    }

}
