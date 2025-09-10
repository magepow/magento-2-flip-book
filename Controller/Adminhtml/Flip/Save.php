<?php


namespace Magepow\Flipbook\Controller\Adminhtml\Flip;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Filesystem\DirectoryList;

class Save extends \Magento\Backend\App\Action
{

    protected $_mediaDir = 'magepow/flipbook';

    protected $coreRegistry;
    protected $dataPersistor;
    protected $directory_list;


    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        \Magento\Framework\App\Filesystem\DirectoryList $directoryList
    ) {
        $this->coreRegistry = $coreRegistry;
        $this->dataPersistor = $dataPersistor;
        $this->directory_list = $directoryList;
        parent::__construct($context);
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
            $id = $this->getRequest()->getParam('entity_id');
    
            $model = $this->_objectManager->create('Magepow\Flipbook\Model\Flip')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This Flip no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            if (isset($_FILES['thumbnail']) && isset($_FILES['thumbnail']['name']) && strlen($_FILES['thumbnail']['name'])) {
                /*
                 * Save image upload
                 */
                try {
                    $uploader = $this->_objectManager->create(
                        'Magento\MediaStorage\Model\File\Uploader',
                        ['fileId' => 'thumbnail']
                    );
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);

                    /** @var \Magento\Framework\Image\Adapter\AdapterInterface $imageAdapter */
                    $imageAdapter = $this->_objectManager->get('Magento\Framework\Image\AdapterFactory')->create();

                    $uploader->addValidateCallback('flipbook_thumbnail', $imageAdapter, 'validateUploadFile');
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(true);

                    /** @var \Magento\Framework\Filesystem\Directory\Read $mediaDirectory */
                    $mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
                        ->getDirectoryRead(DirectoryList::MEDIA);
                    $result = $uploader->save(
                        $mediaDirectory->getAbsolutePath($this->_mediaDir)
                    );
                    $data['thumbnail'] = $this->_mediaDir . $result['file'];
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addError($e->getMessage());
                        return $resultRedirect->setPath('*/*/edit', ['entity_id' => $this->getRequest()->getParam('entity_id')]);// RETURN to turn off the error
                    }
                }
            } else {
                if (isset($data['thumbnail']) && isset($data['thumbnail']['value'])) {
                    if (isset($data['thumbnail']['delete'])) {
                        $data['thumbnail'] = null;
                        $data['delete_thumbnail'] = true;
                    } elseif (isset($data['thumbnail']['value'])) {
                        $data['thumbnail'] = $data['thumbnail']['value'];
                    } else {
                        $data['thumbnail'] = null;
                    }
                }
            }

            if (isset($_FILES['book']) && isset($_FILES['book']['name']) && strlen($_FILES['book']['name'])) {
                /*
                 * Save image upload
                 */
                try {
                    $uploader = $this->_objectManager->create(
                        'Magento\MediaStorage\Model\File\Uploader',
                        ['fileId' => 'book']
                    );
                    $uploader->setAllowedExtensions(['pdf']);
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(true);

                    /** @var \Magento\Framework\Filesystem\Directory\Read $mediaDirectory */
                    $mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
                        ->getDirectoryRead(DirectoryList::MEDIA);
                    $result = $uploader->save(
                        $mediaDirectory->getAbsolutePath($this->_mediaDir)
                    );
                    $data['book'] = $this->_mediaDir . $result['file'];
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addError($e->getMessage());
                         return $resultRedirect->setPath('*/*/edit', ['entity_id' => $this->getRequest()->getParam('entity_id')]);// RETURN to turn off the error
                    }
                }
            } else {
                if (isset($data['book']) && isset($data['book']['value'])) {
                    if (isset($data['book']['delete'])) {
                        $data['book'] = null;
                        $data['delete_book'] = true;
                    } elseif (isset($data['book']['value'])) {
                        $data['book'] = $data['book']['value'];
                    } else {
                        $data['book'] = null;
                    }
                }
            }

            $model->setData($data);
        
            try {

                $model->save();
                $this->messageManager->addSuccess(__('You saved the Flip.'));
                $this->dataPersistor->clear('flipbook_flip');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['entity_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e, __('Something went wrong while saving the Flip.'));
            }
        
            $this->dataPersistor->set('flipbook_flip', $data);
            return $resultRedirect->setPath('*/*/edit', ['entity_id' => $this->getRequest()->getParam('entity_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
