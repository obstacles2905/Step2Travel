<?php

use yii\db\Migration;

/**
 * Handles the creation of table `point_category`.
 */
class m170801_132301_create_point_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('point_category', [
            'id' => $this->primaryKey()->notNull(),
            'name'=>$this->string(20)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('point_category');
    }
}
