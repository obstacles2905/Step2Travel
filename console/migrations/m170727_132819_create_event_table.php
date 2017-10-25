<?php

use yii\db\Migration;

/**
 * Handles the creation of table `event`.
 */
class m170727_132819_create_event_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('event', [
            'id' => $this->primaryKey()->notNull(),
            'name'=>$this->string(40),
            'city'=>$this->integer(),
            'image'=>$this->string(),
            'descriptionEvent'=>$this->text(),
            'date'=>$this->dateTime(),
            'latitude'=>$this->decimal(10,7),
            'longtitude'=>$this->decimal(9,7),
            'begin'=>$this->time(),
            'end'=>$this->time(),
            'category'=>$this->integer()

        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('event');
    }
}
