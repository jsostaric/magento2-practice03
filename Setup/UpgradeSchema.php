<?php
declare(strict_types=1);

namespace Inchoo\Sample03\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()
            ->addColumn(
                $setup->getTable('inchoo_news'),
                'created_at',
                [
                    'type' => Table::TYPE_DATETIME,
                    'comment' => 'created at'
                ]
            )
            ->addColumn(
                $setup->getTable('inchoo_news'),
                'updated_at',
                [
                    'type' => Table::TYPE_DATETIME,
                    'comment' => 'updated at'
                ]
            )
            ->addColumn(
                $setup->getTable('inchoo_news'),
                'content',
                [
                    'type' => Table::TYPE_TEXT,
                    'comment' => 'content'
                ]
            );

        $setup->endSetup();
    }
}
