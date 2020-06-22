<?php

use yii\db\Migration;

/**
 * Class m200621_171136_books
 */
class m200621_171136_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200621_171136_books cannot be reverted.\n";

        return false;
    }

  
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $tableOptions = null; 
        if ($this->db->driverName === 'mysql') {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%books}}', [
            'id' => $this->primaryKey(),
            'DATE_CREATE' => $this->Integer()->notNull(),
            'DATE_EDIT' => $this->Integer()->notNull(),
            'name' => $this->string()->notNull(),
            'IDAUTHOR' => $this->Integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
        ], $tableOptions);
 
        $this->createIndex('idx_org_name', '{{%books}}', 'name');
        $this->createIndex('idx_org_status', '{{%books}}', 'status');
        $this->addForeignKey('FK_author_id', 'books', 'IDAUTHOR', 'authors', 'id', 'RESTRICT', 'RESTRICT');
    }
    }

    public function down()
    {
        echo "m200621_171136_books cannot be reverted.\n";
        $this->dropTable('{{%books}}');
        return false;
    }
  
}
