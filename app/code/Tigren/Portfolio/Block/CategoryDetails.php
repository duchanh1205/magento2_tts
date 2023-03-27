<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\Portfolio\Block;

class CategoryDetails extends \Magento\Framework\View\Element\Template
{
    protected $_categorydetailsFactory;

    public function _construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Tigren\Portfolio\Model\CategoryDetailsFactory $categorydetailsFactory
    ) {
        $this->_categorydetailsFactory = $categorydetailsFactory;
        parent::_construct($context);
    }

    public function _prepareLayout()
    {
        $categorydetails = $this->_categorydetailsFactory->create();
        $collection = $categorydetails->getCollection();
        foreach ($collection as $item) {
            var_dump($item->getData());
        }
        exit;
    }
}

