<?php
/*
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright  Copyright (c)  2023.  Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\AdvancedCheckout\Plugin;

use Magento\Sales\Api\OrderManagementInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterfaceFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Sales\Api\OrderRepositoryInterface;

class GuestToCustomer
{
    /**
     * @var OrderRepositoryInterface
     */
    private OrderRepositoryInterface $orderRepository;
    /**
     * @var AccountManagementInterface
     */
    protected AccountManagementInterface $accountManagement;

    /**
     * @var CustomerRepositoryInterface
     */
    protected CustomerRepositoryInterface $customerRepository;

    /**
     * @var CustomerInterfaceFactory
     */
    protected CustomerInterfaceFactory $customerFactory;

    /**
     * @param OrderRepositoryInterface $orderRepository
     * @param AccountManagementInterface $accountManagement
     * @param CustomerRepositoryInterface $customerRepository
     * @param CustomerInterfaceFactory $customerFactory
     */
    public function __construct(
        OrderRepositoryInterface $orderRepository,
        AccountManagementInterface $accountManagement,
        CustomerRepositoryInterface $customerRepository,
        CustomerInterfaceFactory $customerFactory,
    ) {
        $this->orderRepository = $orderRepository;
        $this->accountManagement = $accountManagement;
        $this->customerRepository = $customerRepository;
        $this->customerFactory = $customerFactory;
    }

    /**
     * @param OrderManagementInterface $subject
     * @param $result
     * @param OrderInterface $order
     * @return mixed
     */
    public function afterPlace(
        OrderManagementInterface $subject,
        $result,
        OrderInterface $order
    ): mixed {
        if ($order->getCustomerId() === null) {
            $shippingAddress = $order->getShippingAddress();

            if ($shippingAddress !== null) {
                $customerEmail = $shippingAddress->getEmail();

                if ($customerEmail !== null) {
                    try {
                        $customer = $this->customerFactory->create();
                        $customer->setEmail($customerEmail);
                        $customer->setFirstname($shippingAddress->getFirstname());
                        $customer->setLastname($shippingAddress->getLastname());

                        $this->accountManagement->createAccount($customer, 'Leminh@0312');

                        $order->setCustomerId($customer->getId());
                        $this->orderRepository->save($order);

                    } catch (LocalizedException $e) {
                    }
                }
            }
        }
        return $result;
    }
}



