<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car}}`.
 */
class m221002_133901_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'color' => $this->string(),
            'name' => $this->string(),
            'user_id' =>$this->integer(),
        ]);
        // $name, $table, $columns, $refTable, $refColumns, $delete = null, $update = null
     $this->addForeignKey('fk-car-user_id','car', 'user_id','user', 'id', 'NO ACTION', 'NO ACTION');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car}}');
    }
}
