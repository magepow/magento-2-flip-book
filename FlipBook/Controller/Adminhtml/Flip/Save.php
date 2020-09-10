<?php


namespace Magepow\FlipBook\Controller\Adminhtml\Flip;

use Magento\Framework\Exception\LocalizedException;


class Save extends \Magento\Backend\App\Action
{

    protected $dataPersistor;

    protected $messageManager;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        \Magento\Framework\App\Filesystem\DirectoryList $directoryList,
        \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->directory_list = $directoryList;
        $this->messageManager = $messageManager;  
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
    
        if ($data) {
            $id = $this->getRequest()->getParam('flip_id');
    
            $model = $this->_objectManager->create('Magepow\FlipBook\Model\Flip')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This Flip no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            if (isset($_FILES['upload']) && $_FILES['upload']['name'] != '') {
                $uploader = $this->_objectManager->get('Magepow\FlipBook\Model\Flip\Upload');
                $backgroundModel = $this->_objectManager->get('Magepow\FlipBook\Model\Flip\Image');
                $uploadZip = $uploader->uploadFileAndGetName('upload', $backgroundModel->getBaseDir(), $data);
                
                $uploadPath = substr($uploadZip, 0, strrpos($uploadZip, '/'));

                $file = $this->directory_list->getPath('media').'/book'.$uploadZip;
            
                $path = pathinfo(realpath($file), PATHINFO_DIRNAME);
                 
                $zip = new \ZipArchive();
                
                $res = $zip->open($file);
                
                if ($res === TRUE) {
                  $zip->extractTo($path);
                  $extfolder = $zip->getNameIndex(0);
                  $zip->close();
                  $data['upload'] = $uploadPath.'/'.$extfolder;
                  unlink($file);
                } else {
                  $data['upload'] = $uploadZip;
                }

                

            }else{
                $data['upload'] = $data['upload']['value'] ?? "";
            }

            if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['name'] != '') {
                    $uploader = $this->_objectManager->get('Magepow\FlipBook\Model\Flip\Upload');
                    $backgroundModel = $this->_objectManager->get('Magepow\FlipBook\Model\Flip\Image');
                    $data['thumbnail'] = $uploader->uploadFileAndGetName('thumbnail', $backgroundModel->getBaseDir(), $data);
            }else{
                $data['thumbnail'] = $data['thumbnail']['value'];
            }

            $model->setData($data);
        
            try {

                $model->save();
                $this->messageManager->addSuccess(__('You saved the Flip.'));
                $this->dataPersistor->clear('book_flip_flip');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['flip_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e, __('Something went wrong while saving the Flip.'));
            }
        
            $this->dataPersistor->set('book_flip_flip', $data);
            return $resultRedirect->setPath('*/*/edit', ['flip_id' => $this->getRequest()->getParam('flip_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
