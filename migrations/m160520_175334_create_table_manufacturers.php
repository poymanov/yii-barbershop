<?php

use yii\db\Migration;

/**
 * Handles the creation for table `table_manufacturers`.
 */
class m160520_175334_create_table_manufacturers extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('manufacturers', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('manufacturers');
    }
}
