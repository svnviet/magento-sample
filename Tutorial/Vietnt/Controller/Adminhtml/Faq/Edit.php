<?php
namespace Tutorial\Vietnt\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action;

class Edit extends \Magento\Backend\App\Action
{
    protected $_coreRegistry = null;
    protected $resultPageFactory;
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }
    
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->_objectManager->create('Tutorial\Vietnt\Model\Faq');
        // $storemodel = $this->_objectManager->create('Tutorial\Vietnt\Model\FaqStore');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This FAQ no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }

        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        // var_dump($data);EXIT;
        if (!empty($data)) {
            $model->setData($data);
        }

        $this->_coreRegistry->register('vietnt_faq', $model);

        // $this->_coreRegistry->register('vietnt_faqstore', $storemodel);
        $resultPage = $this->resultPageFactory->create();

        $resultPage->getConfig()->getTitle()->prepend(__('Faqs'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getTitle() : __('New Faq'));

        return $resultPage;
    }
}
