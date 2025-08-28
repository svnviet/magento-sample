<?php
/**
 * Copyright © 2015 YourCompanyName. All rights reserved.
 */
namespace Tutorial\Vietnt\Model\ResourceModel;

/**
 * ModelName resource
 */
class Faq extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource
     *
     * @return void
     */
     public function __construct(
     		\Magento\Framework\Model\ResourceModel\Db\Context $context
     	)
     	{
     		parent::__construct($context);
     	}

    protected function _construct()
    {
        $this->_init('tutorial_vietnt_faq', 'id');
    }


}
