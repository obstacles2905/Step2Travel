<?php

use yii\db\Migration;

/**
 * Handles the creation of table `point`.
 */
class m170801_140520_create_point_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('point', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(50),
            'image' => $this->string(),
            'panorama' => $this->string(),
            'descriptionPoint' => $this->text(),
            'shortDescriptionPoint' => $this->text(),
            'rate' => $this->float(),
            'latitude' => $this->decimal(10, 7),
            'longtitude' => $this->decimal(9, 7),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('point');
    }
}
