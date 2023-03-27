<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\Portfolio\Block;

class Display extends \Magento\Framework\View\Element\Template
{
    protected $_categoryFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Tigren\Portfolio\Model\CategoryFactory $categoryFactory
    ) {
        $this->_categoryFactory = $categoryFactory;
        parent::__construct($context);
    }

    public function categoryShow()
    {
        return __('Category Show');
    }

    public function getPostCollection()
    {
        $post = $this->_categoryFactory->create();
        //dd($post->getCollection()->getData());
        return $post->getCollection();
    }
}
