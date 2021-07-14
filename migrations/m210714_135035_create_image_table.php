<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image}}`.
 */
class m210714_135035_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'storage_key' => $this->string(),
            'original_name' => $this->string(),
            'mime_type' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%image}}');
    }
}
