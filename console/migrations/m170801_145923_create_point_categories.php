<?php

use yii\db\Migration;

class m170801_145923_create_point_categories extends Migration
{
    public function safeUp()
    {
        $this->createTable('point_categories', [
            'id' => $this->primaryKey()->notNull(),
            'id_point'=>$this->integer(),
            'id_pointcategory'=>$this->integer()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('point_categories');
    }


}
