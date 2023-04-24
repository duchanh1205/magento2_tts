<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Tigren\DeliveryDate\Model;

use Magento\Framework\Stdlib\DateTime\DateTime;

class Validator
{
    /**
     * @var DateTime
     */
    private $dateTime;

    /**
     * Validator constructor.
     *
     * @param DateTime $dateTime
     */
    public function __construct(
        DateTime $dateTime
    ) {
        $this->dateTime = $dateTime;
    }

    /**
     * @param string $deliveryDate
     * @return bool
     */
    public function validate($deliveryDate)
    {
        if ($deliveryDate) {
            $deliveryDate = $this->dateTime->date('Y-m-d H:i:s', $deliveryDate);
            $now = $this->dateTime->date('Y-m-d H:i:s');
            if ($now > $deliveryDate) {
                return false;
            }
        }

        return true;
    }
}
