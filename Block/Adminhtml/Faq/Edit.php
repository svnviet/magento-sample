<?php
namespace Tutorial\Vietnt\Block\Adminhtml\Faq;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    protected $_coreRegistry = null;
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'Tutorial_Vietnt';
        $this->_controller = 'adminhtml_faq';

        parent::_construct();

        if ($this->_isAllowedAction('Tutorial_Vietnt::save')) {
            $this->buttonList->update('save', 'label', __('Save Faq'));
            $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Save and Continue Edit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                -100
            );
        } else {
            $this->buttonList->remove('save');
        }

        if ($this->_isAllowedAction('Tutorial_Vietnt::faq_delete')) {
            $this->buttonList->update('delete', 'label', __('Delete Faq'));
        } else {
            $this->buttonList->remove('delete');
        }
    }
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('vietnt_faq')->getId()) {
            return __("Edit Faq '%1'", $this->escapeHtml($this->_coreRegistry->registry('vietnt_faq')->getTitle()));
        } else {
            return __('New Faq');
        }
    }
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('vietnt/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }
}
