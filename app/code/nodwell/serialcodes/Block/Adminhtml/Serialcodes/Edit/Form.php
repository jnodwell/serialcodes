<?php
/**
 * Created by PhpStorm.
 * User: jennifernodwell
 * Date: 8/26/16
 * Time: 11:19 PM
 */

namespace nodwell\serialcodes\Block\Adminhtml\Serialcodes\Edit;

use \Magento\Backend\Block\Widget\Form\Generic;

class Form extends Generic
{

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
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

    /**
     * Init form
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('serialcodes_form');
        $this->setTitle(__('Serial Code Information'));
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm() {

        /** @var \nodwell\serialcodes\Model\SerialcodesGridInterface $model */
        $model = $this->_coreRegistry->registry('serialcodes_SerialcodesGridInterface');
        $new = !isset($model);

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('serialcode_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Serial Code Information'), 'class' => 'fieldset-wide']
        );

        if (!$new) {
            if ($model->getSerialcodesId()) {
                $fieldset->addField('serialcodes_id', 'hidden', ['name' => 'serialcodes_id']);
            }
        }

        $fieldset->addField(
            'code',
            'text',
            ['name' => 'code', 'label' => __('Code'), 'title' => __('Code'), 'required' => true]
        );

        $fieldset->addField(
            'sku',
            'text',
            ['name' => 'sku', 'label' => __('SKU'), 'title' => __('SKU'), 'required' => true]
        );

        $fieldset->addField(
            'type',
            'text',
            ['name' => 'type', 'label' => __('Type'), 'title' => __('Type'), 'required' => true]
        );

        $fieldset->addField(
            'note',
            'text',
            ['name' => 'note', 'label' => __('Note'), 'title' => __('Note'), 'required' => false]
        );
        
        if (!$new) {
            $form->setValues($model->getData());
        }
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}