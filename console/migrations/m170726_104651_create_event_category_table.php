<?php

use yii\db\Migration;

/**
 * Handles the creation of table `event_category`.
 */
class m170726_104651_create_event_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('event_category', [
            'id' => $this->primaryKey()->notNull(),
            'name'=>$this->string(20)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('event_category');
    }
}
