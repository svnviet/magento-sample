<?php
namespace Tutorial\Vietnt\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Tutorial\Vietnt\Model\ResourceModel\Faq\CollectionFactory;
use Magento\Framework\Controller\ResultFactory;
class MassDisable  extends \Magento\Backend\App\Action
{
    protected $filter;
    protected $collectionFactory;
    public function __construct(Context $context, Filter $filter, CollectionFactory $collectionFactory)
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());

        foreach ($collection as $item) {
            $item['status'] = '0';
            $item->save();
        }

        $this->messageManager->addSuccess(__('A total of %1 record(s) have been disabled.', $collection->getSize()));
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
