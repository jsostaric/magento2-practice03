<?php

namespace Inchoo\Sample03\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class NewsViewModel implements ArgumentInterface
{
    protected $newsFactory;
    protected $newsCollectionFactory;
    protected $newsResource;

    public function __construct(
        \Inchoo\Sample03\Model\ResourceModel\News $newsResource,
        \Inchoo\Sample03\Model\ResourceModel\News\CollectionFactory $newsCollectionFactory,
        \Inchoo\Sample03\Model\NewsFactory $newsFactory
    ) {
        $this->newsResource = $newsResource;
        $this->newsCollectionFactory = $newsCollectionFactory;
        $this->newsFactory = $newsFactory;
    }

    public function getAllNews()
    {
        $newsCollection = $this->newsCollectionFactory->create();
        $newsCollection->setOrder('news_id', 'desc');
        $newsCollection->setPageSize(10);

        return $newsCollection;
    }

    public function getNewsById($id)
    {
        $news = $this->newsFactory->create();
        $this->newsResource->load($news, $id, 'news_id');

        if ($news->getId() === null) {
            return;
        }

        return $news;
    }
}
