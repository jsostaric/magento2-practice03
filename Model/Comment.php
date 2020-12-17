<?php


namespace Inchoo\Sample03\Model;


use Magento\Framework\Model\AbstractModel;

class Comment extends AbstractModel
{
    public function __construct()
    {
        $this->_init(\Inchoo\Sample03\Model\ResourceModel\Comment::class);
    }
}
