<?php

use yii\db\Migration;
use php_rutils\RUtils;

/**
 * Handles the creation for table `products`.
 */
class m160520_190614_create_products extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'description' => $this->text(),
            'available' => $this->boolean()->defaultValue(0),
            'image' => $this->string(),
            'sku' => $this->string(),
            'price' => $this->integer(),
            'manufacturer_id' => $this->integer(),
            'category_id' => $this->integer()
        ]);

        $this->addForeignKey('pk_products_manufacturers','products','manufacturer_id','manufacturers','id','SET NULL','CASCADE');
        $this->addForeignKey('pk_products_category','products','category_id','categories','id','SET NULL','CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('pk_products_manufacturers','products');
        $this->dropForeignKey('pk_products_category','products');
        $this->dropTable('products');
    }
}
