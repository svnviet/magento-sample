<?php

namespace Tutorial\Vietnt\Setup;

use Magento\Framework\Db\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    public function upgrade(SchemaSetupInterface $setup,ModuleContextInterface $context) {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.1.0', '<')) {

            $table = $installer->getConnection()->newTable(
                $installer->getTable('tutorial_vietnt_faqstore')
            )->addColumn(
                'id_tab',
                  Table::TYPE_INTEGER,
                  null,
                  [
                      'identity' => true,
                      'unsigned' => true,
                      'nullable' => false,
                      'primary' => true
                  ],
               'ID TAB'
            )->addColumn(
                'id',
                \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                null,
                [
                    'unsigned' => true,
                    'nullable' => false
                ],
                'ID'
            )->addColumn(
                'store_id',
                \Magento\Framework\Db\Ddl\Table::TYPE_SMALLINT,
                5,
                [
                    'unsigned' => true,
                    'nullable'=> false
                ],
                'Store ID'
            
            )->addForeignKey(
                $setup->getFkName('faq_store', 'store_id', 'store', 'store_id'),
                'store_id',
                $setup->getTable('store'),
                'store_id',
                Table::ACTION_CASCADE
)


            ->addForeignKey(
                $setup->getFkName('faq_store', 'id', 'tutorial_vietnt_faq', 'id'),
                'id',
                $setup->getTable('tutorial_vietnt_faq'),
                'id',
                Table::ACTION_CASCADE

            )
            ->setComment('FAQ Store table');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}