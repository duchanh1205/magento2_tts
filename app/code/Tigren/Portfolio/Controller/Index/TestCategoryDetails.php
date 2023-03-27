<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\Portfolio\Controller\Index;

class TestCategoryDetails extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    protected $_categorydetailsFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Tigren\Portfolio\Model\CategoryDetailsFactory $categorydetailsFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_categorydetailsFactory = $categorydetailsFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $categorydetails = $this->_categorydetailsFactory->create();
        $collection = $categorydetails->getCollection();
        foreach ($collection as $item) {
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
        return $this->_pageFactory->create();
    }
}
