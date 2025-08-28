<?php
namespace Tutorial\Vietnt\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Tutorial\Vietnt\Model\ResourceModel\Faq\Collection as FaqCollection;
use \Tutorial\Vietnt\Model\ResourceModel\Faq\CollectionFactory as FaqCollectionFactory;
use \Tutorial\Vietnt\Model\Faq;

class FaqList extends  \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{
    protected $_faqCollectionFactory ;
    public function __construct(
        Context $context,
        FaqCollectionFactory $faqCollectionFactory,
        array $data = []
    ) {
        $this->_faqCollectionFactory = $faqCollectionFactory;
        parent::__construct($context, $data);
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('Faqs'));
        if ($this->getFaqs()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'vietnt.faq.pager'
            )->setAvailableLimit(array(5=>5,10=>10))->setShowPerPage(true)->setCollection(
                $this->getFaqs()
            );
            $this->setChild('pager', $pager);
            $this->getFaqs()->load();
        }
        return $this;
    }

    public function getFaqs()
    {
        $page=($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;

        $pageSize=($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 1;

        $faqCollection = $this->_faqCollectionFactory->create();
        $faqCollection->addFieldToSelect('*')->addFilter('status', 1);
        $faqCollection->setPageSize($pageSize);
        $faqCollection->setCurPage($page);
        return $faqCollection;
    }

		 public function getIdentities()
	 	{
	 			return [\Tutorial\Vietnt\Model\Faq::CACHE_TAG . '_' . 'list'];
	 	}

		public function getFaqUrl(
		Faq $faq
) {
		return '/vietnt/faq/view/id/' . $faq->getId();
}
        public function getPagerHtml()
        {
            return $this->getChildHtml('pager');
        }

}
?>
