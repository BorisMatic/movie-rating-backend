<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%show}}`.
 */
class m210713_201227_create_show_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%show}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'image_id' => $this->string(255),
            'description' => $this->text(),
            'release_date' => $this->timestamp(),
            'type' => $this->string(),
            'total_points' => $this->integer(),
            'total_votes' => $this->integer(),
            'rating' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%show}}');
    }
}
