<?php

use yii\db\Migration;

/**
 * Class m200328_085429_product
 */
class m200328_085429_product extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(32)->notNull(),
            'description' => $this->string(),
            'category_id' => $this->integer()
        ]);

        $this->addForeignKey(
            'fk_product_category_id',
            '{{%product}}', 'category_id',
            '{{%category}}', 'id',
            'SET NULL', 'CASCADE'
        );

        $this->createTable('product_tag', [
            'product_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk_product_tag_product',
            'product_tag', 'product_id',
            'product', 'id',
            'CASCADE', 'CASCADE'
        );

        $this->addForeignKey(
            'fk_product_tag_tag',
            'product_tag', 'tag_id',
            'tag', 'id',
            'CASCADE', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_category_id', '{{%product}}');
        $this->dropForeignKey('fk_product_tag_product', 'product_tag');
        $this->dropForeignKey('fk_product_tag_tag', 'product_tag');
        $this->dropTable('product_tag');
        $this->dropTable('{{%product}}');
    }
}
