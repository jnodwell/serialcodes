<?php
/**
 * Created by PhpStorm.
 * User: jennifernodwell
 * Date: 8/24/16
 * Time: 2:45 PM
 */
namespace nodwell\serialcodes\Controller\Adminhtml\Index;
class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $page = $this->resultPageFactory->create();
        $page->setActiveMenu('nodwell_serialcodes::serialcodes');
        $page->addBreadcrumb(__('Products'),__('Products'));
        $page->addBreadcrumb(__('Serialcodes'),__('Serialcodes'));
        $page->getConfig()->getTitle()->prepend(__('Serial Codes'));
        return $page;
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('ACL RULE HERE');
    }

}