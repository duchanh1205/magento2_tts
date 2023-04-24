<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\AdvancedCheckout\Controller\Cart;

class ClearAllCart extends \Magento\Framework\App\Action\Action
{
    protected $checkoutCart;

    protected $product;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Checkout\Model\Cart $checkoutCart,
        \Magento\Framework\Controller\Result\JsonFactory $resultFactory,
    ) {
        $this->checkoutCart = $checkoutCart;
        $this->resultJsonFactory = $resultFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $cart = $this->checkoutCart;
        if ($cart->getQuote()->getItemsCount()) {
            $cart->truncate()->save();
        }
        $result->setData(['result' => 'success', 'message' => __('Cart is empty!!')]);
        return $result;
    }
}
