<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
declare(strict_types=1);

namespace Tigren\CustomerGroupCatalog\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface RuleRepositoryInterface
{

    /**
     * Save Rule
     * @param \Tigren\CustomerGroupCatalog\Api\Data\RuleInterface $rule
     * @return \Tigren\CustomerGroupCatalog\Api\Data\RuleInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Tigren\CustomerGroupCatalog\Api\Data\RuleInterface $rule
    );

    /**
     * Retrieve Rule
     * @param string $ruleId
     * @return \Tigren\CustomerGroupCatalog\Api\Data\RuleInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($ruleId);

    /**
     * Retrieve Rule matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Tigren\CustomerGroupCatalog\Api\Data\RuleSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Rule
     * @param \Tigren\CustomerGroupCatalog\Api\Data\RuleInterface $rule
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Tigren\CustomerGroupCatalog\Api\Data\RuleInterface $rule
    );

    /**
     * Delete Rule by ID
     * @param string $ruleId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($ruleId);

}

