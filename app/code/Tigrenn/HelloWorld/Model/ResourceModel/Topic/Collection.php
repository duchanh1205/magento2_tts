<?php

namespace Tigrenn\HelloWorld\Model\ResourceModel\Topic;

class Collection extends
    \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Tigrenn\HelloWorld\Model\Topic',
            'Tigrenn\HelloWorld\Model\ResourceModel\Topic');
    }
}
