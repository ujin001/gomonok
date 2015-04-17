<?php

use yii\db\Schema;
use yii\db\Migration;

class m150417_163734_startup extends Migration
{
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'created_by' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'modified_by' => Schema::TYPE_INTEGER . ' NOT NULL',
            'modified_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
        ]);

        $this->createIndex('category_created_by_ix', 'category', 'created_by');
        $this->createIndex('category_modified_by_ix', 'category', 'modified_by');
        $this->addForeignKey('category_created_by_fk', 'category', 'created_by', 'user', 'id');
        $this->addForeignKey('category_modified_by_fk', 'category', 'modified_by', 'user', 'id');

        $this->createTable('transaction', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(255) DEFAULT NULL',
            'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'cost' => Schema::TYPE_DECIMAL . '(10.2) NOT NULL',
            'created_by' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
            'modified_by' => Schema::TYPE_INTEGER . ' NOT NULL',
            'modified_at' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
        ]);

        $this->createIndex('transaction_category_ix', 'transaction', 'category_id');
        $this->createIndex('transaction_created_by_ix', 'transaction', 'created_by');
        $this->createIndex('transaction_modified_by_ix', 'transaction', 'modified_by');
        $this->addForeignKey('transaction_category_fk', 'transaction', 'category_id', 'category', 'id');
        $this->addForeignKey('transaction_created_by_fk', 'transaction', 'created_by', 'user', 'id');
        $this->addForeignKey('transaction_modified_by_fk', 'transaction', 'modified_by', 'user', 'id');
    }
    
    public function safeDown()
    {
        $this->dropTable('transaction');
        $this->dropTable('category');
    }
}
