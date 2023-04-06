<?php

namespace Tigrenn\HelloWorld\Model;

class Topic extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'Tigrenn_blog';

    protected function _construct()
    {
        $this->_init('Tigren\HelloWorld\Model\ResourceModel\Topic');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
