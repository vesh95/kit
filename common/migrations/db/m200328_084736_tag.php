<?php

use yii\db\Migration;

/**
 * Class m200328_084736_tag
 */
class m200328_084736_tag extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(32)->notNull()
        ]);

        $this->createIndex('uniq_tag', '{{%tag}}', 'title', $unique = true);
    }

    public function safeDown()
    {
        $this->dropIndex('uniq_tag', '{{%tag}}');
        $this->dropTable('{{%tag}}');
    }
}
