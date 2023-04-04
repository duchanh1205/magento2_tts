<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
declare(strict_types=1);

namespace Tigren\CustomerGroupCatalog\Api\Data;

interface RuleSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Rule list.
     * @return \Tigren\CustomerGroupCatalog\Api\Data\RuleInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Tigren\CustomerGroupCatalog\Api\Data\RuleInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

