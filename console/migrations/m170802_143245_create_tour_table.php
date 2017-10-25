<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tour`.
 */
class m170802_143245_create_tour_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('tour', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(),
            'city' => $this->integer(),
            'type' => $this->integer(),
            'category' => $this->integer(),
            'description' => $this->text(),
            'image' => $this->string(),
            'rate' => $this->float(),
            'tour3d' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('tour');
    }
}
