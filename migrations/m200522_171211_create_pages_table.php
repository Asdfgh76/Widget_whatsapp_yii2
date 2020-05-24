<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pages}}`.
 */
class m200522_171211_create_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey(),
            'domain' => $this->string()
        ]);

        $this->batchInsert('pages', 
        ['domain'], 
        [['https://www.google.ru/'], ['https://yandex.ru/'], ['https://www.youtube.com/']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pages}}');
    }
}
