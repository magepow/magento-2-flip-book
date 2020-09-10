<?php


namespace Magepow\FlipBook\Controller\Adminhtml\Flip;

class Edit extends \Magepow\FlipBook\Controller\Adminhtml\Flip
{

    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('flip_id');
        $model = $this->_objectManager->create('Magepow\FlipBook\Model\Flip');
        
        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This Flip no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('book_flip_flip', $model);
        
        // 5. Build edit form
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage)->addBreadcrumb(
            $id ? __('Edit Flip') : __('New Flip'),
            $id ? __('Edit Flip') : __('New Flip')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Flips'));
        $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getTitle() : __('New Flip'));
        return $resultPage;
    }
}
