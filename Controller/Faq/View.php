<?php

namespace Tutorial\Vietnt\Controller\Faq;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\View\Result\PageFactory;
use \Magento\Framework\View\Result\Page;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\Exception\LocalizedException;
use \Magento\Framework\Registry;

class View extends Action
{
    const REGISTRY_KEY_FAQ_ID = 'tutorial_vietnt_faq_id';


    protected $_coreRegistry;

    protected $_resultPageFactory;

    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory
    ) {
        parent::__construct(
            $context
        );
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $this->_coreRegistry->register(self::REGISTRY_KEY_FAQ_ID, (int) $this->_request->getParam('id'));
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}
