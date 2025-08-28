<?php

namespace Tutorial\Vietnt\Block;

use \Magento\Framework\Exception\LocalizedException;
use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\Registry;
use \Tutorial\Vietnt\Model\Faq;
use \Tutorial\Vietnt\Model\FaqFactory;
use \Tutorial\Vietnt\Controller\Faq\View as ViewAction;

class View extends Template
{
    /**
     * Core registry
     * @var Registry
     */
    protected $_coreRegistry;

    /**
     * Post
     * @var null|Post
     */
    protected $_faq = null;

    /**
     * PostFactory
     * @var null|PostFactory
     */
    protected $_faqFactory = null;

    /**
     * Constructor
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PostFactory $postCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        FaqFactory $faqFactory,
        array $data = []
    ) {
        $this->_faqFactory = $faqFactory;
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }

    /**
     * Lazy loads the requested post
     * @return Post
     * @throws LocalizedException
     */
    public function getFaq()
    {
        if ($this->_faq === null) {
            /** @var Post $post */
            $faq = $this->_faqFactory->create();
            $faq->load($this->_getFaqId());

            if (!$faq->getId()) {
                throw new LocalizedException(__('Faq not found'));
            }

            $this->_faq = $faq;
        }
        return $this->_faq;
    }

    /**
     * Retrieves the post id from the registry
     * @return int
     */
    protected function _getFaqId()
    {
        return (int) $this->_coreRegistry->registry(
            ViewAction::REGISTRY_KEY_FAQ_ID
        );
    }
}
