<?php


namespace Magepow\FlipBook\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface
{

    private $eavSetupFactory;

    /**
     * {@inheritdoc}
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        //Your install script

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'category',
            [
                'type' => 'int',
                'label' => 'category',
                'input' => 'select',
                'sort_order' => 333,
                'source' => 'Magepow\FlipBook\Model\Category\Attribute\Source\Category',
                'global' => 1,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => null,
                'group' => 'General Information',
                'backend' => ''
            ]
        );

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Category::ENTITY,
            'status',
            [
                'type' => 'int',
                'label' => 'status',
                'input' => 'boolean',
                'sort_order' => 333,
                'source' => '',
                'global' => 1,
                'visible' => true,
                'required' => true,
                'user_defined' => false,
                'default' => null,
                'group' => 'General Information',
                'backend' => ''
            ]
        );
    }

    /**
     * Constructor
     *
     * @param \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
}
