<?php
/**
 *
 */

namespace Tigren\CustomerGroupCatalog\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;

class CustomPrice implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $product = $observer->getProduct();
        $customPrice = 100;
        $product->setFinalPrice($customPrice);
    }

}
