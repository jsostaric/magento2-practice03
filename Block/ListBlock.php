<?php


namespace Inchoo\Sample03\Block;


use Magento\Framework\View\Element\Template;

class ListBlock extends \Magento\Framework\View\Element\Template
{

    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }
}
