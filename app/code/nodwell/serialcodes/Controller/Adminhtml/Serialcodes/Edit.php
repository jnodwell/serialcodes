<?php
/**
 * Created by PhpStorm.
 * User: jennifernodwell
 * Date: 8/26/16
 * Time: 10:01 PM
 */

namespace nodwell\serialcodes\Controller\Adminhtml\Serialcodes;

use Magento\Backend\App\Action;
use nodwell\serialcodes\Model\SerialcodesGridInterface;

class Edit extends Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var \nodwell\serialcodes\Model\SerialcodesGridInterface
     */
    protected $_model; //should be unused - TODO: replace with modelFactory http://alanstorm.com/magento_2_object_manager_instance_objects

    protected $logger;

    /**
     * @param Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Framework\Registry $registry
     * @param \nodwell\serialcodes\Model\SerialcodesGridInterface $model
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        \nodwell\serialcodes\Model\SerialcodesGridInterface $model
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->_model = $model;
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/saveserialcodes.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $this->logger = $logger;
        parent::__construct($context);
        
        //TODO: figure out how to pass a factory instead of a model in the constructor here
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('nodwell_serialcodes::serialcodes_save');
    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('nodwell_serialcodes::Serialcodes')
            ->addBreadcrumb(__('Serialcodes'), __('Serialcodes'))
            ->addBreadcrumb(__('Manage Serialcodess'), __('Manage Serialcodess'));
        return $resultPage;
    }

    /**
     * Edit Serialcodes
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        //$this->logger->info("we have an id? " . $id);
        $model = $this->_model;

        // If you have got an id, it's edit screen
        if ($id) {
            //$this->logger->info(get_class($model) . " getSerialcodesId " . $model->getSerialcodesId());
            $model->load($id);
            //$this->logger->info(get_class($model) . " getSerialcodesId " . $model->getSerialcodesId());
            if (!$model->getSerialcodesId()) {
                $this->messageManager->addError(__('This Serial Code no longer exists.'));
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('serialcodes/index/index');
            }
        }

        $data = $this->_getSession()->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
            //$this->logger->info(get_class($model) . " getCode " . $model->getCode());
        }

        $this->_coreRegistry->register('serialcodes_SerialcodesGridInterface', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Serialcodes') : __('New Serialcodes'),
            $id ? __('Edit Serialcodes') : __('New Serialcodes')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Serialcodes'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? __('Edit Serialcodes: ') . $model->getType() : __('New Serialcodes'));

        return $resultPage;
    }
}