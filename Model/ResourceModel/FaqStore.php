<?php
namespace Tutorial\Vietnt\Model\ResourceModel;


class FaqStore extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('tutorial_vietnt_faqstore', 'id_tab');
	}
	
}
