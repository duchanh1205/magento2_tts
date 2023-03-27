<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\Portfolio\Block;

class Details extends \Magento\Framework\View\Element\Template
{
    protected $_detailsFactory;

    public function _construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Tigren\Portfolio\Model\DetailsFactory $detailsFactory
    ) {
        $this->_detailsFactory = $detailsFactory;
        parent::_construct($context);
    }

    public function _prepareLayout()
    {
        $details = $this->_detailsFactory->create();
        $collection = $details->getCollection();
        foreach ($collection as $item) {
            var_dump($item->getData());
        }
        exit;
    }
}
