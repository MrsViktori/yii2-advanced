<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->string()->notNull()->defaultValue('Пользователь'),
            'created_at' => $this->string()->notNull(),
            'updated_at' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'autor' => $this->integer(),
            'category' => $this->integer(),
            'body' => $this->string()->notNull(),
            'price' => $this->integer()->notNull(),
            'data_publish' => $this->string()->notNull(),
            'data_update' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('post_autor', 'post', 'autor', 'user', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('post_category', 'post', 'category', 'category', 'id', 'SET NULL', 'CASCADE');
    }


    public function down()
    {
        $this->dropForeignKey('post_autor', 'post');
        $this->dropForeignKey('post_category', 'post');
        $this->dropTable('{{%post}}');
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%user}}');
    }
}
