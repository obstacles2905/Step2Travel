<?php

use yii\db\Migration;

class m170803_123557_create_cafe extends Migration
{
    public function safeUp()
    {
        $this->createTable('cafe', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(50),
            'image' => $this->string(),
            'descriptionCafe' => $this->text(),
            'rate' => $this->float(),
            'latitude' => $this->decimal(10, 7),
            'longtitude' => $this->decimal(9, 7),
            'tour3d' => $this->string(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('cafe');
    }


}
