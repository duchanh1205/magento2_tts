<?php

namespace Tigren\HelloWorld\Model\ResourceModel;

class Topic extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('Tigren_topic', 'topic_id');
    }
}
