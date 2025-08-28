<?php

namespace Tutorial\Vietnt\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup,ModuleContextInterface $context){

        $setup->startSetup();
        $conn = $setup->getConnection();
        $tableName = $setup->getTable('tutorial_vietnt_faq');
        // Check if the table already exists
        if($conn->isTableExists($tableName) != true){
            $table = $conn->newTable($tableName)

                          ->addColumn(
                                      'id',
                                      Table::TYPE_INTEGER,
                                      null,
                                      [
                                          'identity' => true,
                                          'unsigned' => true,
                                          'nullable' => false,
                                          'primary' => true
                                      ],
                                      'ID'
                            )
                            ->addColumn(
                                        'title',
                                        Table::TYPE_TEXT,
                                        null,
                                        ['nullable' => false, 'default' => ''],
                                        'Title'
                                    )
                            ->addColumn(
                                        'description',
                                        Table::TYPE_TEXT,
                                        null,
                                        ['nullable' => false, 'default' => ''],
                                        'Description'
                                    )
                            ->addColumn(
                              					'image',
                              					Table::TYPE_TEXT,
                              					255,
                              					[],
                              					'Image'
                                        )
                            ->addColumn(
                                        'status',
                                        Table::TYPE_SMALLINT,
                                        null,
                                        ['nullable' => false, 'default' => '1'],
                                        'Status'
                                    )
                            ->addColumn(
                                        'create_at',
                                        Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                                        'Created At'
                                    )
                            ->addColumn(
                                        'update_at',
                                        Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE], 
                                        'Update At'
                                    )
                            ->addColumn(
                                        'observer',
                                        Table::TYPE_TEXT,
                                        255,
                                        ['nullable' => false, 'default' => 'create'],
                                        'Observer'
                                      )
                            ->addIndex($setup->getIdxName('vietnt_faq', ['id']), ['id'])
                            ->setComment('FAQ Table')
                            ->setOption('type', 'InnoDB')
                            ->setOption('charset', 'utf8');
                        $conn->createTable($table);
                    }

                    $setup->endSetup();
                }
            }
?>




