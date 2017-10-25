<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tourtype`.
 */
class m170801_125447_create_tourtype_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('tourtype', [
            'id' => $this->primaryKey()->notNull(),
            'name'=>$this->string(40),
            'image'=>$this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('tourtype');
    }
}
