<?php

use yii\db\Migration;

class m171101_215329_insert_dictionary extends Migration
{
    public function safeUp()
    {
        $this->insert('dictionary', [
            
            'category_id' => 1,
            'language_id' => 1,
            'name' => "cat",
            'translation' => "kaķis",
        ]);

        $this->insert('dictionary', [
            
            'category_id' => 1,
            'language_id' => 2,
            'name' => "cat",
            'translation' => "кот",
        ]);
        

        $this->insert('dictionary', [
            
            'category_id' => 1,
            'language_id' => 1,
            'name' => "dog",
            'translation' => "suns",
        
        ]);

        $this->insert('dictionary', [
            
            'category_id' => 2,
            'language_id' => 1,
            'name' => "website",
            'translation' => null,
        
        ]);

        $this->insert('dictionary', [
            
            'category_id' => 3,
            'language_id' => 4,
            'name' => "dictionary",
            'translation' => null,
        
        ]);

        $this->insert('dictionary', [
            
            'category_id' => 4,
            'language_id' => 3,
            'name' => "example",
            'translation' => null,
        
        ]);

        $this->insert('dictionary', [
            
            'category_id' => 4,
            'language_id' => 2,
            'name' => "task",
            'translation' => 'задание',
        
        ]);

    }

    public function safeDown()
    {
        //deletes all rows!
         $this->delete(
        'dictionary', ''
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171101_215329_insert_dictionary cannot be reverted.\n";

        return false;
    }
    */
}
