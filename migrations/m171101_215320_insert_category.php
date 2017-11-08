<?php

use yii\db\Migration;

class m171101_215320_insert_category extends Migration
{
    public function safeUp()
    {
        $this->insert('category', [
            
            'name' => 'app',
        ]);

        $this->insert('category', [
            
            'name' => 'frontend',
        ]);

        $this->insert('category', [
            
            'name' => 'backend',
        ]);

        $this->insert('category', [
            
            'name' => 'api',
        ]);

        
    }

    public function safeDown()
    {
        //deletes all rows!
        $this->delete(
        'category', ''
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171101_215320_insert_category cannot be reverted.\n";

        return false;
    }
    */
}
