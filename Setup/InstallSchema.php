<?php

namespace Inchoo\Sample03\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('inchoo_news')
        )->addColumn(
            'news_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'News Id'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'News Title'
        )->setComment(
            'News Table'
        );
        $setup->getConnection()->createTable($table);

        /*      Comments table       */
        $commentsTable = $setup->getConnection()->newTable(
            $setup->getTable('inchoo_news_comments')
        )
        ->addColumn(
            'comment_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Comment Id'
        )
        ->addColumn(
            'content',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Comment content'
        )
        ->addColumn(
            'news_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['unsigned' => true],
            'Comment content'
        )
        ->setComment('Comments table');

        $setup->getConnection()->createTable($commentsTable);

        $setup->getConnection()->addForeignKey(
            $setup->getFkName(
                'inchoo_news_comments',
                'news_id',
                'inchoo_news',
                'news_id'
            ),
            'inchoo_news_comments',
            'news_id',
            'inchoo_news',
            'news_id'
        );

        $setup->endSetup();
    }
}
