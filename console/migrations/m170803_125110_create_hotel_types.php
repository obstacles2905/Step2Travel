<?php

use yii\db\Migration;

class m170803_125110_create_hotel_types extends Migration
{
    public function safeUp()
    {
        $this->createTable('hotel_types', [
            'id' => $this->primaryKey()->notNull(),
            'id_hotel'=>$this->integer(),
            'id_hoteltype'=>$this->integer()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('hotel_types');
    }

}
