<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%actor}}`.
 */
class m210713_201526_create_actor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%actor}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string('255'),
            'last_name' => $this->string('255'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%actor}}');
    }
}
