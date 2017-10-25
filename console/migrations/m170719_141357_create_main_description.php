<?php

use yii\db\Migration;

class m170719_141357_create_main_description extends Migration
{
    public function safeUp()
    {
        $this->createTable('maindescription',
            [
                'id' => $this->primaryKey()->notNull(),
                'introText' => $this->text(),
                'videoURL' => $this->text(),
                'videoText' => $this->text(),
                'show'=>$this->boolean()

            ]);
    }

    public function safeDown()
    {
        $this->dropTable('maindescription');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170719_141357_create_main_description cannot be reverted.\n";

        return false;
    }
    */
}
