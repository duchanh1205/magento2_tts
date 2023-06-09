<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) 2023 Amasty (https://www.amasty.com)
 * @package Customer Group Catalog for Magento 2
 */

namespace Amasty\Groupcat\Block\Framework\Pricing;

use Amasty\Groupcat\Model\ConfigProvider;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\App\ObjectManager;

class RequestPopup extends \Magento\Backend\Block\Template
{
    public const HIDE_PRICE_POPUP_LINK_KEY = 'AmastyHidePricePopup';

    /**
     * @var \Amasty\Groupcat\Helper\Data
     */
    private $helper;

    /**
     * @var \Magento\Framework\Json\EncoderInterface
     */
    private $jsonEncoder;

    /**
     * @var ConfigProvider
     */
    private $configProvider;

    public function __construct(
        \Amasty\Groupcat\Helper\Data $helper,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        \Magento\Backend\Block\Template\Context $context,
        ConfigProvider $configProvider = null
    ) {
        parent::__construct($context);
        $this->helper = $helper;
        $this->jsonEncoder = $jsonEncoder;
        $this->configProvider = $configProvider ?? ObjectManager::getInstance()->get(ConfigProvider::class);
    }

    /**
     * Render Block
     *
     * @param ProductInterface $product
     * @return string
     */
    public function getProductRequestPrice(ProductInterface $product)
    {
        $html = '';

        if ($this->getContent()) {
            if ($this->isPopup()) {
                $this->assign('formConfig', $this->generateFormConfig($product));
            }
            $this->assign('product', $product);

            $html = $this->toHtml();
        }

        return $html;
    }

    /**
     * Get relevant path to template
     *
     * @return string
     */
    public function getTemplate()
    {
        if ($this->isPopup()) {
            return 'Amasty_Groupcat::price/requestPopup.phtml';
        }
        if ($this->getLink()) {
            return 'Amasty_Groupcat::price/requestLink.phtml';
        }

        return 'Amasty_Groupcat::price/requestText.phtml';
    }

    /**
     * Return content of link block like image and/or text
     *
     * @return string
     */
    public function getContent()
    {
        return $this->getLayout()
            ->createBlock(\Amasty\Groupcat\Block\Framework\Pricing\Request\Content::class)
            ->toHtml();
    }

    /**
     * Is popup can be processed
     *
     * @return bool
     */
    public function isPopup()
    {
        return $this->getLink() === self::HIDE_PRICE_POPUP_LINK_KEY;
    }

    /**
     * Return href
     * if href == "AmastyHidePricePopup", popup should be processed
     *
     * @return string
     */
    public function getLink(): string
    {
        $storeId = (int) $this->_storeManager->getStore()->getId();

        return $this->escapeUrl(trim($this->configProvider->getFrontendLink($storeId)));
    }

    /**
     * Return custom CSS of container
     *
     * @return string
     */
    public function getCustomStyles()
    {
        $customStyles = $this->helper->getModuleStoreConfig('frontend/custom_css');
        if ($customStyles) {
            return 'style="' . $customStyles . '"';
        }

        return '';
    }

    /**
     * @param ProductInterface $product
     * @return string
     */
    private function generateFormConfig(ProductInterface $product)
    {
        $customer = $this->helper->getCustomerSession()->getCustomer();
        return $this->jsonEncoder->encode([
            'url' => $this->getUrl('amasty_groupcat/request/add'),
            'id' => $product->getId(),
            'name'   => $product->getName(),
            'customer' => [
                'name'  => $customer->getName(),
                'email' => $customer->getEmail(),
                'phone' => $customer->getPhone()
            ]
        ]);
    }
}
