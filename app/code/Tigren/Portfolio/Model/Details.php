<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\Portfolio\Model;

class Details extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface

{
    const CACHE_TAG = 'Tigren_portfolio_details';

    protected function _construct()
    {
        $this->_init('Tigren\Portfolio\Model\ResourceModel\Details');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
