<?php

use yii\db\Migration;

class m170803_122642_create_cafe_type extends Migration
{
    public function safeUp()
    {
        $this->createTable('cafe_type', [
            'id' => $this->primaryKey()->notNull(),
            'name'=>$this->string(20)
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('cafe_type');
    }


}
