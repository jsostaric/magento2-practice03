<?php

namespace Inchoo\Sample03\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class AllNewsViewModel implements ArgumentInterface
{
    protected $newsCollectionFactory;
    public function __construct(
        \Inchoo\Sample03\Model\ResourceModel\News\CollectionFactory $newsCollectionFactory
    ) {
        $this->newsCollectionFactory = $newsCollectionFactory;
    }

    public function getAllNews()
    {
        $newsCollection = $this->newsCollectionFactory->create();
        $newsCollection->setOrder('news_id', 'desc');
        $newsCollection->setPageSize(10);

        return $newsCollection;
    }
}
