<?php


namespace Magepow\Flipbook\Setup;

use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        $table = $setup->getConnection()
            ->newTable($setup->getTable('magepow_flipbook'))->addColumn(
            'entity_id',
            Table::TYPE_INTEGER,
            null,
            array('identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,),
            'Entity ID'
            )
            ->addColumn('title', Table::TYPE_TEXT, null, [], 'Title')
            ->addColumn('author', Table::TYPE_TEXT, null, [], 'Author')
            ->addColumn('description', Table::TYPE_TEXT, null, [], 'Description')
            ->addColumn('thumbnail', Table::TYPE_TEXT, null, [], 'Thumbnail')
            ->addColumn('book', Table::TYPE_TEXT, null, [], 'Book')
            ->addColumn('status', Table::TYPE_SMALLINT, null, ['nullable' => false, 'default' => '1'], 'Status')
            ->addColumn('created_time', Table::TYPE_DATETIME, null, ['nullable' => true, 'default' => null], 'Created Time')
            ->addColumn('update_time', Table::TYPE_DATETIME, null, ['nullable' => true, 'default' => null], 'Update Time')
            ->addIndex($installer->getIdxName('entity_id', ['entity_id']), ['entity_id'])
            ->setComment('Magepow Flipbook');

        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
