<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\AdvancedCheckout\Api;

interface CustomInterface
{
    /**
     * GET for Post api
     * @param string $productIds
     * @param string $attributeCode
     * @return string
     */
    public function getCustomAttributeByProductId($productIds, $attributeCode);
}
