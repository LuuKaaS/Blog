<?php

use yii\db\Migration;

/**
 * Class m180529_145417_add
 */
class m180529_145417_add extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //create index for column 'user_id'
        $this->createIndex(
                'test-user_id',
                'article',
                'user_id'
                );
        
        // add foreing key for table 'user'
        $this->addForeignKey(
                'test-user_id',
                'article',
                'user_id',
                'user',
                'id',
                'CASCADE'
                );
        
           // create index for column 'category_id'
        $this->createIndex(
                'test-category_id',
                'category',
                'id'
                );
        
        // add foreing key for table 'category'
        $this->addForeignKey(
                'test-category_id',
                'category',
                'id',
                'article',
                'category_id',
                'CASCADE'
                );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180529_145417_add cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180529_145417_add cannot be reverted.\n";

        return false;
    }
    */
}
