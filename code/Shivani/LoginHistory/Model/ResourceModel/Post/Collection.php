<?php

namespace Shivani\LoginHistory\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Shivani\LoginHistory\Model\Post',
            'Shivani\LoginHistory\Model\ResourceModel\Post'
        );
    }
}