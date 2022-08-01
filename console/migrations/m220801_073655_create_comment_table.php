<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m220801_073655_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(512),
            'body' => $this->text(),
            'post_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
        ]);

        // membuat foreign key untuk table comment dan user yang direpresentasikan oleh kolom created_by
        // relasi yang dipakai adalah one to many karena satu komen hanya dimiliki satu user dan satu user bisa memiliki banyak komen
        $this->addForeignKey('FK_comment_user_created_by', '{{%comment}}', 'created_by', '{{%user}}', 'id');

        // membuat foreign key untuk table comment dan post yang direpresentasikan oleh kolom post_id
        // relasi yang dipakai adalah one to many karena satu komen hanya bisa ada dalam satu post dan satu post bisa memiliki banyak komen
        $this->addForeignKey('FK_comment_post_post_id', '{{%comment}}', 'post_id', '{{%post}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_comment_user_created_by', '{{ %comment }}');
        $this->dropForeignKey('FK_comment_post_post_id', '{{ %comment }}');
        $this->dropTable('{{%comment}}');
    }
}
