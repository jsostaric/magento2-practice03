<?php


namespace Inchoo\Sample03\Block;


use Inchoo\Sample03\Model\ResourceModel\News\CollectionFactory;
use Magento\Framework\View\Element\Template;

class ListBlock extends \Magento\Framework\View\Element\Template
{
    protected $newsCollectionFactory;

    public function __construct(Template\Context $context, CollectionFactory $newsCollectionFactory, array $data = [])
    {
        parent::__construct($context, $data);
        $this->newsCollectionFactory = $newsCollectionFactory;
    }

    public function getList()
    {
        $newsCollection = $this->newsCollectionFactory->create();
        $newsCollection->setOrder('news_id', 'desc')
            ->setPageSize(10);
        return $newsCollection;
    }
}
