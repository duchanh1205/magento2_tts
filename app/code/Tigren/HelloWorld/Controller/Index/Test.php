<?php

namespace Tigren\HelloWorld\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_topicFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Tigren\HelloWorld\Model\TopicFactory $topicFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_topicFactory = $topicFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->_topicFactory->create();
        $collection = $post->getCollection();
        foreach ($collection as $item) {
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
        return $this->_pageFactory->create();
    }
}

