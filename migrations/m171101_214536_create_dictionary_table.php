<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dictionary`.
 */
class m171101_214536_create_dictionary_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dictionary', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'language_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'translation' => $this->string()->null(),
        ]);


        // creates index for column `category_id`
        $this->createIndex(
            'idx-dictionary-category_id',
            'dictionary',
            'category_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-dictionary-category_id',
            'dictionary',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );

        // creates index for column `language_id`
        $this->createIndex(
            'idx-dictionary-language_id',
            'dictionary',
            'language_id'
        );

        // add foreign key for table `language`
        $this->addForeignKey(
            'fk-dictionary-language_id',
            'dictionary',
            'language_id',
            'language',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {

         // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-dictionary-category_id',
            'dictionary'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-dictionary-category_id',
            'dictionary'
        );

          // drops foreign key for table `language`
        $this->dropForeignKey(
            'fk-dictionary-language_id',
            'dictionary'
        );

        // drops index for column `language_id`
        $this->dropIndex(
            'idx-dictionary-language_id',
            'dictionary'
        );
        
        $this->dropTable('dictionary');
    }
}
