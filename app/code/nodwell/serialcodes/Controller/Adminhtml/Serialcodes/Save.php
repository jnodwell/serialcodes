<?php
/**
 * Created by PhpStorm.
 * User: jennifernodwell
 * Date: 8/26/16
 * Time: 10:04 PM
 */

namespace nodwell\serialcodes\Controller\Adminhtml\Serialcodes;

use Magento\Backend\App\Action;

class Save extends Action
{
    /**
     * @var \nodwell\serialcodes\Model\SerialcodesGridInterface
     */
    protected $_model;

    protected $logger;


    /**
     * @param Action\Context $context
     * @param \nodwell\serialcodes\Model\SerialcodesGridInterface $model
     */
    public function __construct(
        Action\Context $context,
        \nodwell\serialcodes\Model\SerialcodesGridInterface $model
    ) {
        $this->_model = $model;
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/saveserialcodes.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $this->logger = $logger;
        //$this->logger->info("inside constructor is there a code? " . $model->getCode());
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('nodwell_serialcodes::serialcodes_save');
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        //$this->logger->info(print_r( $data, true ));
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            /** @var \nodwell\serialcodes\Model\SerialcodesGridInterface $model */
            $model = $this->_model;

            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }

            $model->setData($data);
            //$this->logger->info($model->getCode());

            $this->_eventManager->dispatch(
                'serialcodes_serialcode_prepare_save',
                ['serialcodes' => $model, 'request' => $this->getRequest()]
            );

            try {
                //$this->logger->info("trying to save " . $model->getCode() . " from " . get_class($model));
                $model->save();
                //$this->logger->info(" we just saved " . $model->getCode());
                $this->messageManager->addSuccess(__('Serial Code saved'));
                $this->_getSession()->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('serialcodes/index/index');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->logger->info('\Magento\Framework\Exception\LocalizedException' . $e->getMessage());
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->logger->info("Runtime Exception: " . $e->getMessage());
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->logger->info("Something went wrong while saving the serialcode: " . $e->getMessage());
                $this->messageManager->addException($e, __('Something went wrong while saving the serialcode'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['entity_id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}