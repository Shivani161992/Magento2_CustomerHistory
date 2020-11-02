<?php

namespace Shivani\LoginHistory\Model;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class Post extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Shivani\LoginHistory\Model\ResourceModel\Post');
    }
}