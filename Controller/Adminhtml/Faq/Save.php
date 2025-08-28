<?php
namespace Tutorial\Vietnt\Controller\Adminhtml\Faq;
use Magento\Framework\App\Filesystem\DirectoryList;




class Save extends \Magento\Backend\App\Action
{   

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $model =$this->_objectManager->create('Tutorial\Vietnt\Model\Faq');
        $storemodel = $this->_objectManager->create('Tutorial\Vietnt\Model\FaqStore');
 
        if ($data) {


            $data['image'] = 'image.png';
            $store_id = $data['store_id'];
            $store_id= $store_id[0];

            if (isset($data['id'])) {
                $model->setObserver('edit');
                $id = $data['id'];
                $model->setId($id);
                $collection = $this->_objectManager->create('\Tutorial\Vietnt\Model\ResourceModel\FaqStore\Collection');
                $collection->addFilter('id', $id);
                
                $dt = $collection->getData();
                // var_dump($dt);EXIT;
                $storemodel->setIdTab($dt[0]['id_tab']);
            }


            // $storemodel->setIdTab('1');
            // $storemodel->setId('1');
            // $storemodel->setStoreId('1');
            //  // var_dump($storemodel->getData());EXIT; 
            //  $storemodel->save();

            $model->setTitle($data['title']);
            $model->setImage($data['image']);
            $model->setDescription($data['description']);
            $model->setStatus($data['status']);
            // var_dump($data['title']);EXIT;
            try {
                // var_dump($model->getData());EXIT; 
                $model->save();


                $storemodel->setId($model->getId());
                $storemodel->setStoreId($store_id);
                // var_dump($storemodel->getData());EXIT; 
                try{
                    $storemodel->save();
                }
                
                catch(Exception $e){
                    var_dump($e->getMessage());exit;
                }
                // var_dump($storemodel->getId(),$storemodel->getStoreId(),$storemodel->getIdTab());EXIT; 

                $this->messageManager->addSuccess(__());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId(), '_current' => true));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (\Magento\Framework\Model\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving .'));
            }

            $this->_getSession()->setFormData($data);
            $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            return;
        }
        $this->_redirect('*/*/');
    }
}