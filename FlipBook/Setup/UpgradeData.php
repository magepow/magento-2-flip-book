<?php


namespace Magepow\FlipBook\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();
        if (version_compare($context->getVersion(), "1.0.0", "<")) {
        //Your upgrade script
        }
        $setup->endSetup();
    }
}
