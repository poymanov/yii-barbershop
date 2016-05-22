<?php

use yii\db\Migration;
use php_rutils\RUtils;

/**
 * Handles the creation for table `categories`.
 */
class m160520_184710_create_categories extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()
        ]);

        // Начальные данные
        $categories = array('Бритвенные принадлежности', 'Средства для ухода', 'Аксессуары');


        // Заполнение таблицы начальными данными
        foreach ($categories as $category) {
            $this->insert('categories',
                array(
                    'name' => $category,
                    'slug' => RUtils::translit()->slugify($category)
                )
            );
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('categories');
    }
}
