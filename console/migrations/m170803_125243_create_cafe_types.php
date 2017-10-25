<?php

use yii\db\Migration;

class m170803_125243_create_cafe_types extends Migration
{
    public function safeUp()
    {
        $this->createTable('cafe_types', [
            'id' => $this->primaryKey()->notNull(),
            'id_cafe'=>$this->integer(),
            'id_cafetype'=>$this->integer()
        ]);

    }

    public function safeDown()
    {
        $this->dropTable('cafe_types');
    }


}
