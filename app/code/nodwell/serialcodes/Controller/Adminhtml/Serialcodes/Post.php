<?php
/**
 * Created by PhpStorm.
 * User: jennifernodwell
 * Date: 9/20/16
 * Time: 10:19 AM
 */

namespace nodwell\serialcodes\Controller\Adminhtml\Serialcodes;
class Post extends \Magento\Backend\App\AbstractAction {
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context
        ,\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
    }

    /**
     * @return \Magento\Framework\Controller\Result\Json
     */
    public function execute() {
        /** @var \Magento\Framework\Controller\Result\Json $result */
        $result = $this->resultJsonFactory->create();
        return $result->setData(['success' => true,
                                 'message' => 'ajax response here']);
    }
}