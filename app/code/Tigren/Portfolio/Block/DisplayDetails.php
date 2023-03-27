<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\Portfolio\Block;

class DisplayDetails extends \Magento\Framework\View\Element\Template
{
    protected $_detailsFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Tigren\Portfolio\Model\DetailsFactory $DetailsFactory
    ) {
        $this->_detailsFactory = $DetailsFactory;
        parent::__construct($context);
    }

    public function DetailsShow()
    {
        return __('Category Details Show');
    }

    public function getPostCollection()
    {
        $post = $this->_detailsFactory->create();
        //dd($post->getCollection()->getData());
        return $post->getCollection();
    }
}
