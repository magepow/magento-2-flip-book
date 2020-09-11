<?php


namespace Magepow\FlipBook\Controller\Adminhtml\Flip;

class Delete extends \Magepow\FlipBook\Controller\Adminhtml\Flip
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('flip_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create('Magepow\FlipBook\Model\Flip');
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('You deleted the Flip.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['flip_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find a Flip to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
