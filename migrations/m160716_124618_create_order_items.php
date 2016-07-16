<?php

use yii\db\Migration;

class m160716_124618_create_order_items extends Migration
{
    public function up()
    {
        $this->createTable('orderItems', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'qty' => $this->integer()->notNull(),
            'price' => $this->integer(),
        ]);

        $this->addForeignKey('pk_orders-items_orders','orderItems','order_id','orders','id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('pk_orders-items_orders','orderItems');
        $this->dropTable('orderItems');
        return true;
    }
}
