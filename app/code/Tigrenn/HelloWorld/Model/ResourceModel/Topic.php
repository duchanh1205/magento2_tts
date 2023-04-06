<?php

namespace Tigrenn\HelloWorld\Model\ResourceModel;

class Topic extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('Tigrenn_blog', 'blog_id');
    }
}
