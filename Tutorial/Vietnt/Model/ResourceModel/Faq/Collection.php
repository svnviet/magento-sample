<?php
namespace Tutorial\Vietnt\Model\ResourceModel\Faq;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{


        protected $_idFieldName = 'id';
        protected $_eventPrefix = 'tutorial_vietnt_faq_collection';
        protected $_eventObject = 'faq_collection';

    public function _construct()
    {
        $this->_init('Tutorial\Vietnt\Model\Faq', 'Tutorial\Vietnt\Model\ResourceModel\Faq');
    }
}
