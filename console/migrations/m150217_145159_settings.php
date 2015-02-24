<?php

use yii\db\Schema;
use yii\db\Migration;
use common\components\Settings;

class m150217_145159_settings extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%settings}}', [
            'name' => Schema::TYPE_STRING,
            'value' => Schema::TYPE_TEXT . ' NOT NULL',
            'label' => Schema::TYPE_STRING . '(255) NOT NULL',
            'type' => Schema::TYPE_STRING . '(32) NOT NULL DEFAULT "' . Settings::TYPE_TEXT . '"',
        ], $tableOptions);
        $this->addPrimaryKey('pk_name', '{{%settings}}', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%settings}}');
    }
}
