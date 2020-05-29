<?php
namespace Tutorial\Vietnt\Model\ResourceModel\FaqStore;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id_tab';
	protected $_eventPrefix = 'tutorial_vietnt_faqstore_collection';
	protected $_eventObject = 'faqstore_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Tutorial\Vietnt\Model\FaqStore', 'Tutorial\Vietnt\Model\ResourceModel\FaqStore');
	}

}

