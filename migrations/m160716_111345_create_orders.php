<?php

use yii\db\Migration;

class m160716_111345_create_orders extends Migration
{
    public function up()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('pk_orders_users','orders','user_id','user','id','CASCADE','CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('pk_orders_users','orders');
        $this->dropTable('orders');
        return true;
    }

}
