<?php


namespace Inchoo\Sample03\Block;


use Magento\Framework\View\Element\Template;

class ListBlock extends Template
{
    protected $newsCollectionFactory;

    public function __construct(
        Template\Context $context,
        \Inchoo\Sample03\Model\ResourceModel\News\CollectionFactory $collectionFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->newsCollectionFactory = $collectionFactory;
    }

    public function getList()
    {
        $newsCollection = $this->newsCollectionFactory->create();
        $newsCollection->setOrder('news_id', 'desc')->setPageSize(10);
        return $newsCollection;
    }
}
