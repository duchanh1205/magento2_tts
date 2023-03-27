<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2022 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
declare(strict_types=1);

namespace Tigren\Portfolio\Block\Adminhtml\Category\Create;

use Magento\Framework\UrlInterface;

class GenericButton
{
    public function __construct(
        private UrlInterface $url
    ) {
    }

    public function getUrl(string $route = '', array $params = []): string
    {
        return $this->url->getUrl($route, $params);
    }
}
