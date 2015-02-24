<?php

use yii\db\Schema;
use yii\db\Migration;

class m150219_120545_menu extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%menu}}', [
            'id' => Schema::TYPE_PK,
            'label' => Schema::TYPE_STRING . '(255) NOT NULL',
            'url' => Schema::TYPE_STRING . '(255) NOT NULL',
            'parent_id' => Schema::TYPE_INTEGER . ' NULL',
            'sort_index' => Schema::TYPE_INTEGER . ' DEFAULT 500',
        ], $tableOptions);
        $this->addForeignKey('parent', '{{%menu}}', 'parent_id', '{{%menu}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%menu}}');
    }
}
