<?php
/**
 * Created by PhpStorm.
 * User: jennifernodwell
 * Date: 8/26/16
 * Time: 11:16 PM
 */

namespace nodwell\serialcodes\Block\Adminhtml\Serialcodes;

use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Serialcodes edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'serialcodes_id';
        $this->_blockGroup = 'nodwell_serialcodes';
        $this->_controller = 'adminhtml_serialcodes';

        parent::_construct();

        if ($this->_isAllowedAction('nodwell_serialcodes::serialcodes_save')) {
            $this->buttonList->update('save', 'label', __('Save Serial Code'));
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

    }

    /**
     * Get header with Serialcodes name
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('serialcodes_serialcodes')->getId()) {
            return __("Edit Serialcodes '%1'", $this->escapeHtml($this->_coreRegistry->registry('serialcodes_serialcodes')->getName()));
        } else {
            return __('New Serialcodes');
        }
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    /**
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('*/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }
}