<?php


namespace Magepow\FlipBook\Setup;

use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;

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

        $table_book_flip = $setup->getConnection()->newTable($setup->getTable('book_flip'));

        
        $table_book_flip->addColumn(
            'flip_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            array('identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,),
            'Entity ID'
        );
        

        
        $table_book_flip->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'title'
        );
        
        $table_book_flip->addColumn(
            'author',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'author'
        );
        
        $table_book_flip->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'description'
        );

        $table_book_flip->addColumn(
            'thumbnail',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'thumbnail'
        );
        
        $table_book_flip->addColumn(
            'upload',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'upload'
        );

        $table_book_flip->addColumn(
            'pages',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [],
            'pages'
        );
        

        $setup->getConnection()->createTable($table_book_flip);

        $setup->endSetup();
    }
}
