<?php
 
namespace Magepow\Flipbook\Block\Adminhtml\Flip\Edit;
 
use Magento\Backend\Block\Widget\Form\Generic;
 
class Form extends Generic
{
    /**
     * @return $this
     */

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
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
        $this->setId('flip_form');
        $this->setTitle(__('Book Information'));
    }

    protected function _prepareForm()
    {

        $model = $this->_coreRegistry->registry('flipbook_flip');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            [
                'data' => [
                    'id'    => 'edit_form',
                    'action' => $this->getData('action'),
                    'method' => 'post',
                    'enctype' => 'multipart/form-data'
                ]
            ]
        );

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getEntityId()) {
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        }

        $fieldset->addField('title','text',
            [
                'name' => 'title', 
                'label' => __('Name'), 
                'title' => __('Name'), 
                'required' => true
            ]
        );

        $fieldset->addField('thumbnail', 'image', 
            [
                'name' => 'thumbnail', 
                'label' => __('Thumbnail'), 
                'title' => __('Thumbnail')
            ]
        );

        $fieldset->addType(
            'pdf',
            '\Magepow\Flipbook\Block\Adminhtml\Flip\Renderer\Pdf'
        );
        
        $fieldset->addField('book','pdf',
            [
                'name' => 'book', 
                'label' => __('Book'), 
                'title' => __('Book')
            ]
        );
        
        $fieldset->addField('author','text',
            [
                'name' => 'author', 
                'label' => __('Author'), 
                'title' => __('Author')
            ]
        );

        $fieldset->addField('description','textarea',
            [
                'name' => 'description', 
                'label' => __('Description'), 
                'title' => __('Description')
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
 
        return parent::_prepareForm();
    }
}