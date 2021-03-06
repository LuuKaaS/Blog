<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_tag`.
 */
class m180523_094037_create_article_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article_tag', [
            'id' => $this->primaryKey(),
            'article_id' =>$this->integer(),
            'tag_id' =>$this->integer(),
        ]);
        
        // create index for column 'user_id'
        $this->createIndex(
                'tag_article_article_id',
                'article_tag',
                'article_id'
                );
        
        // add foreign key for table 'user'
        $this->addForeignKey(
                'tag_article_article_id',
                'article_tag',
                'article_id',
                'article',
                'id',
                'CASCADE'
                );
        
        // create index for column 'user_id'
        $this->createIndex(
                'idx_tag_id',
                'article_tag',
                'tag_id'
                );
        
        // add foreing key for table 'user'
        $this->addForeignKey(
                'fk-tag_id',
                'article_tag',
                'tag_id',
                'tag',
                'id',
                'CASCADE'
                );
        
        // --------------------------create index for column 'user_id'
        $this->createIndex(
                'idx-user_id',
                'article',
                'user_id'
                );
        
        // ---------------------------add foreing key for table 'user'
        $this->addForeignKey(
                'fk-user_id',
                'article',
                'user_id',
                'user',
                'id',
                'CASCADE'
                );
        
           // create index for column 'category_id'
        $this->createIndex(
                'idx-category_id',
                'article',
                'category_id'
                );
        
        // add foreing key for table 'category'
        $this->addForeignKey(
                'fk-category_id',
                'article',
                'category_id',
                'category',
                'id',
                'CASCADE'
                );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article_tag');
    }
}
