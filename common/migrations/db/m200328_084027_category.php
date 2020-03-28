<?php

use yii\db\Migration;

/**
 * Class m200328_084027_category
 */
class m200328_084027_category extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(32)->notNull()
        ]);

        $this->createIndex('uniq_category', '{{%category}}', 'title', $unique = true);
    }

    public function safeDown()
    {
        $this->dropIndex('uniq_category', '{{%category}}');
        $this->dropTable('{{%category}}');
    }
}
