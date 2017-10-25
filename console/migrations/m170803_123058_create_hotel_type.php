<?php

use yii\db\Migration;

class m170803_123058_create_hotel_type extends Migration
{
    public function safeUp()
    {
        $this->createTable('hotel_type', [
            'id' => $this->primaryKey()->notNull(),
            'name'=>$this->string(20)
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('hotel_type');
    }

}
