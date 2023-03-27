<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\Portfolio\Block;

class Category extends \Magento\Framework\View\Element\Template
{
    protected $_categoryFactory;

    public function _construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Tigren\Portfolio\Model\CategoryFactory $categoryFactory
    ) {
        $this->_categoryFactory = $categoryFactory;
        parent::_construct($context);
    }

    public function _prepareLayout()
    {
        $category = $this->_categoryFactory->create();
        $collection = $category->getCollection();
        foreach ($collection as $item) {
            var_dump($item->getData());
        }
        exit;
    }
}
