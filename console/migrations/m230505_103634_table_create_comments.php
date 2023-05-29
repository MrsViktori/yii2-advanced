<?php

use yii\db\Migration;

/**
 * Class m230505_103634_table_create_comments
 */
class m230505_103634_table_create_comments extends Migration
{

    public function up()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'post' => $this->integer(),
            'body' => $this->string()->notNull(),
            'created_at' => $this->string()->notNull(),
            'updated_at' => $this->string()->notNull(),
        ]);

        $this->addForeignKey('comments_post', 'comments', 'post', 'post', 'id', 'SET NULL','CASCADE');
    }


    public function down()
    {
        $this->dropForeignKey('comments_post', 'comments');
        $this->dropTable('{{%comments}}');
    }

}
