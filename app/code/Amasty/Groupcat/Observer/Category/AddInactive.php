<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) 2023 Amasty (https://www.amasty.com)
 * @package Customer Group Catalog for Magento 2
 */

namespace Amasty\Groupcat\Observer\Category;

use Amasty\Groupcat\Model\ResourceModel\Rule\CollectionFactory;
use Magento\Framework\Event\ObserverInterface;

/**
 * observer for event catalog_category_tree_init_inactive_category_ids
 */
class AddInactive implements ObserverInterface
{
    /**
     * @var \Amasty\Groupcat\Model\ProductRuleProvider
     */
    private $ruleProvider;

    /**
     * @var \Amasty\Groupcat\Helper\Data
     */
    private $helper;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    public function __construct(
        \Amasty\Groupcat\Model\ProductRuleProvider $ruleProvider,
        \Amasty\Groupcat\Model\ResourceModel\Rule\CollectionFactory $collectionFactory,
        \Amasty\Groupcat\Helper\Data $helper
    ) {
        $this->ruleProvider = $ruleProvider;
        $this->helper       = $helper;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if (!$this->helper->isModuleEnabled()) {
            return;
        }
        $categoryIds = $this->ruleProvider->getRestrictCategoriesId();
        if (is_array($categoryIds) && count($categoryIds)) {
            $observer->getEvent()->getTree()->addInactiveCategoryIds($categoryIds);
        }
    }
}
