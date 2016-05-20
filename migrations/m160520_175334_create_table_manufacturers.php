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
            'name' => $this->string()->notNull()
        ]);

        // Начальные данные
        $manufacturers = array(
            'Baxter of California',
            'Mr Natty',
            'Suavecito',
            'Malin+Goetz',
            'Murray\'s',
            'American crew'
        );
        
        // Заполнение таблицы начальными данными
        foreach ($manufacturers as $manufacturer) {
            $this->insert('manufacturers',array(
                'name' => $manufacturer));
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('manufacturers');
    }
}
