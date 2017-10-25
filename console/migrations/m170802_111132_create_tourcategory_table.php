<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tourcategory`.
 */
class m170802_111132_create_tourcategory_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('tourcategory', [
            'id' => $this->primaryKey()->notNull(),
            'name'=>$this->string(40),
            'icon'=>$this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('tourcategory');
    }
}
