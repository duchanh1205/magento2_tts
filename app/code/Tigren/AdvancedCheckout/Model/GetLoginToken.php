<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\AdvancedCheckout\Model;

class GetLoginToken
{
    /**
     * @var \Magento\Integration\Model\Oauth\TokenFactory
     */
    private $tokenModelFactory;

    /**
     * @param \Magento\Integration\Model\Oauth\TokenFactory $tokenModelFactory
     */
    public function __construct(
        \Magento\Integration\Model\Oauth\TokenFactory $tokenModelFactory
    ) {
        $this->tokenModelFactory = $tokenModelFactory;
    }

    /**
     * @inheritdoc
     */
    public function getToken($customerId)
    {
        $customerToken = $this->tokenModelFactory->create();
        return $customerToken->createCustomerToken($customerId)->getToken();

    }

}
