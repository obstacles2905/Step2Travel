<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tourpoint`.
 */
class m170804_133826_create_tourpoint_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('tourpoint', [
            'id' => $this->primaryKey()->notNull(),
            'idTour'=>$this->integer(),
            'idPoint'=>$this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('tourpoint');
    }
}
