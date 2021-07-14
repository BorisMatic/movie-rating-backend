<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%show_actor}}`.
 */
class m210713_202612_create_show_actor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%show_actor}}', [
            'id' => $this->primaryKey(),
            'show_id' => $this->integer(),
            'actor_id' => $this->integer()
        ]);

        $this->addForeignKey('fk_show_actor_show_id', 'show_actor', 'show_id', 'show', 'id');
        $this->addForeignKey('fk_show_actor_actor_id', 'show_actor', 'actor_id', 'actor', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_show_actor_show_id', 'show_actor');
        $this->dropForeignKey('fk_show_actor_actor_id', 'show_actor');
        $this->dropTable('{{%show_actor}}');
    }
}
