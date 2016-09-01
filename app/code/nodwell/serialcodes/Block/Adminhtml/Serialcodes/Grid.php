<?php
/**
 * Created by PhpStorm.
 * User: jennifernodwell
 * Date: 8/25/16
 * Time: 10:13 PM
 */

namespace nodwell\serialcodes\Block\Adminhtml\Serialcodes;

class Grid extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'nodwell_serialcodes';
        $this->_controller = 'adminhtml_grid';
        $this->_headerText = __('Serial Codes');
        $this->_addButtonLabel = __('Add New Serial Code');
        parent::_construct();
        $this->buttonList->add(
            'serialcodes_apply',
            [
                'label' => __('Serialcodes'),
                'onclick' => "location.href='" . $this->getUrl('serialcodes/*/applySerialcodes') . "'",
                'class' => 'apply'
            ]
        );
    }
}