<?php


namespace Magepow\Flipbook\Controller\Adminhtml;

abstract class Flip extends \Magento\Backend\App\Action
{

    protected $_coreRegistry;
    const ADMIN_RESOURCE = 'Magepow_Flipbook::flipbook';

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);

    }

    /**
     * Init page
     *
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     */
    public function initPage($resultPage)
    {
        $resultPage->setActiveMenu('Magepow_Flipbook::flipbook')
            ->addBreadcrumb(__('Book'), __('Book'))
            ->addBreadcrumb(__('Flip'), __('Flip'));
        return $resultPage;
    }
}
