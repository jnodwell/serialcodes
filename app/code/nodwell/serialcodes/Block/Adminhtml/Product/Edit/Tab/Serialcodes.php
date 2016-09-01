<?php
/**
 * Created by PhpStorm.
 * User: jennifernodwell
 * Date: 8/23/16
 * Time: 11:57 PM
 */
namespace nodwell\serialcodes\Block\Adminhtml\Product\Edit\Tab;


class Serialcodes extends \Magento\Backend\Block\Widget implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    protected $_template = 'catalog/product/edit/tab/serialcodes.phtml';


    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    protected function _prepareLayout()
    {

        return parent::_prepareLayout();
    }

    public function getTabLabel() {
        return __('Serial Codes');
    }
    public function getTabTitle() {
        return __('Serial Codes');
    }
    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}
