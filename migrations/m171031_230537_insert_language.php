<?php

use yii\db\Migration;

class m171031_230537_insert_language extends Migration
{
    public function safeUp()
    {
        $this->insert('language', [
            
            'code' => 'lat',
            'name' => 'Latvian',
        ]);

        $this->insert('language', [
            
            'code' => 'rus',
            'name' => 'Russian',
        ]);

        $this->insert('language', [
            
            'code' => 'fre',
            'name' => 'French',
        ]);

        $this->insert('language', [
            
            'code' => 'ger',
            'name' => 'German',
        ]);
    }

    public function safeDown()
    {
        //deletes all rows!
        $this->delete(
        'language', ''
        );
        // echo "m171031_230537_insert_language cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171031_230537_insert_language cannot be reverted.\n";

        return false;
    }
    */
}
