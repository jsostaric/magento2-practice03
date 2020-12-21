<?php

namespace Inchoo\Sample03\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class NewsViewModel implements ArgumentInterface
{
    protected $newsFactory;
    protected $newsResource;

    public function __construct(
        \Inchoo\Sample03\Model\ResourceModel\News $newsResource,
        \Inchoo\Sample03\Model\NewsFactory $newsFactory
    ) {
        $this->newsResource = $newsResource;
        $this->newsFactory = $newsFactory;
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
