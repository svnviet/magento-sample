<?php
namespace Tutorial\Vietnt\Block\Adminhtml\Faq\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected $_systemStore;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
       // \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,        
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    protected function _construct()
    {
        parent::_construct();
        $this->setId('faq_form');
        $this->setTitle(__('Faq Information'));
    }
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('vietnt_faq');
        // $id = $this->_coreRegistry->registry('vietnt_faqstore')->getId();
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('faq_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }

        $fieldset->addField(
            'title',
            'text',
            ['name' => 'title', 'label' => __('Title'), 'title' => __('Title'), 'required' => true]
        );

        $fieldset->addField(
       'store_id',
       'multiselect',
       [
        'name' => 'store_id',
        'id'=>'store_id',
        'label' => __('Store View'),
        'title' => __('Store View'),
        'required' => true,
        // 'class' => 'store',
        // 'value'   =>  $this->_storeManager->getStore(true)->getId(),             
        'values'   => $this->_systemStore->getStoreValuesForForm(false, true),
        // 'values'   =>  $this->_storeManager->getStore(true)->getId(),
       ]
    );
        // var_dump($this->_systemStore->getStoreValuesForForm(false, true));EXIT;

        $fieldset->addField(
            'description',
            'editor',
            [
                'name' => 'description',
                'label' => __('Description'),
                'title' => __('Description'),
                'style' => 'height:36em',
                'required' => true
            ]
        );
        $fieldset->addType('required_image', 'Tutorial\Vietnt\Block\Adminhtml\Helper\Image_Required');
        $fieldset->addField(
                'image',
                'image',
            [
                'name' => 'image',
                'label' => __('Image'),
                'title' => __('Image'),
                'note'  => 'Extension of file as: jpg, jpeg, png'
                // 'config' => $wysiwygConfig
            ]
    );


        $fieldset->addField(
            'status',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Status'),
                'name' => 'status',
                'required' => true,
                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
            ]
        );



        $form->setValues($model->getData());
        // $form->setValues('store_id',$id);
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
