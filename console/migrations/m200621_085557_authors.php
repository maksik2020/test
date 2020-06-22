<?php

use yii\db\Migration;

/**
 * Class m200621_085557_authors
 */
class m200621_085557_authors extends Migration
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
        echo "m200621_085557_authors cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $tableOptions = null; 
        if ($this->db->driverName === 'mysql') {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%authors}}', [
            'id' => $this->primaryKey(),
            'DATE_CREATE' => $this->Integer()->notNull(),
            'DATE_EDIT' => $this->Integer()->notNull(),
            'name' => $this->string()->notNull(),
            'booksCount' => $this->smallInteger()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
        ], $tableOptions);
 
        $this->createIndex('idx_org_name', '{{%authors}}', 'name');
        $this->createIndex('idx_org_status', '{{%authors}}', 'status');
    }
    }

    public function down()
    {
        echo "m200621_085557_authors cannot be reverted.\n";
        $this->dropTable('{{%authors}}');
        return false;
    }
   
}
