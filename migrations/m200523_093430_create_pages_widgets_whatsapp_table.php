<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pages_widgets_whatsapp}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%pages}}`
 */
class m200523_093430_create_pages_widgets_whatsapp_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pages_widgets_whatsapp}}', [
            'id' => $this->primaryKey(),
            'page_id' => $this->integer()->unique()->notNull(),
            'phone' => $this->string(20)->notNull(),
            'pulse' => $this->boolean(),
            'label' => $this->string()->null(),
        ]);

        // creates index for column `page_id`
        $this->createIndex(
            '{{%idx-pages_widgets_whatsapp-page_id}}',
            '{{%pages_widgets_whatsapp}}',
            'page_id'
        );

        // add foreign key for table `{{%pages}}`
        $this->addForeignKey(
            '{{%fk-pages_widgets_whatsapp-page_id}}',
            '{{%pages_widgets_whatsapp}}',
            'page_id',
            '{{%pages}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%pages}}`
        $this->dropForeignKey(
            '{{%fk-pages_widgets_whatsapp-page_id}}',
            '{{%pages_widgets_whatsapp}}'
        );

        // drops index for column `page_id`
        $this->dropIndex(
            '{{%idx-pages_widgets_whatsapp-page_id}}',
            '{{%pages_widgets_whatsapp}}'
        );

        $this->dropTable('{{%pages_widgets_whatsapp}}');
    }
}
