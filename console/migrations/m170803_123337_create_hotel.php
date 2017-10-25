<?php

use yii\db\Migration;

class m170803_123337_create_hotel extends Migration
{
    public function safeUp()
    {
        $this->createTable('hotel', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(50),
            'image' => $this->string(),
            'descriptionHotel' => $this->text(),
            'rate' => $this->float(),
            'latitude' => $this->decimal(10, 7),
            'longtitude' => $this->decimal(9, 7),
            'tour3d' => $this->string(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('hotel');
    }

}
