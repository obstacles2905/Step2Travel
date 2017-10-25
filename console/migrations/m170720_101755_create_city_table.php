<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city`.
 */
class m170720_101755_create_city_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('city', [
            'id' => $this->primaryKey()->notNull(),
            'ip' => $this->string(15),
            'name' => $this->string(40),
            'descriptionCity' => $this->text(),
            'image' => $this->string(),
            'panorama' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('city');
    }
}
