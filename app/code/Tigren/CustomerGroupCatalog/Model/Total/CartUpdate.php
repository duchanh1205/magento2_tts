<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\CustomerGroupCatalog\Model\Total;

class CartUpdate extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{
    protected $priceCurrency;

    public function __construct(
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
    ) {
        $this->priceCurrency = $priceCurrency;
    }

    public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {
        parent::collect($quote, $shippingAssignment, $total);

        $customDiscount = 10;
        $discount = $this->priceCurrency->convert($customDiscount);
        $total->setTotalAmount('discount', -$discount);
        $total->setBaseTotalAmount('discount', -$customDiscount);
        $total->setBaseGrandTotal($total->getBaseGrandTotal() - $customDiscount);
        $quote->setDiscount(-$discount);
        return $this;
    }
}
