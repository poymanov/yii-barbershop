<?php

use yii\db\Migration;

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

        // Начальные значения
        $products = array(
            array(
                'name' => 'Набор для путешествий «Baxter of California»',
                'description' => '
                    Travel Kit – необходимый аксессуар во время любого путешествия.
                    В аккуратной кожаной сумке находится все, что нужно для бритья и ухода
                    за кожей во время рабочей поездки или отдыха: средство для умывания,
                    увлажняющий крем, крем для бритья, крем после бритья, шампунь. Набор
                    также может стать отличным подарком.',
                'available' => 1,
                'sku' => 'Dexter-ae',
                'price' => 2900,
                'manufacturer_id' => 1,
                'category_id' => 3
            ),
            array(
                'name' => 'Увлажняющий кондиционер «Baxter of California»',
                'description' => '
                    Travel Kit – необходимый аксессуар во время любого путешествия.
                    В аккуратной кожаной сумке находится все, что нужно для бритья и ухода
                    за кожей во время рабочей поездки или отдыха: средство для умывания,
                    увлажняющий крем, крем для бритья, крем после бритья, шампунь. Набор
                    также может стать отличным подарком.',
                'available' => 1,
                'sku' => 'Dexter-ae',
                'price' => 750,
                'manufacturer_id' => 1,
                'category_id' => 2
            ),
            array(
                'name' => 'Гель для волос «Suavecito»',
                'description' => '
                    Travel Kit – необходимый аксессуар во время любого путешествия.
                    В аккуратной кожаной сумке находится все, что нужно для бритья и ухода
                    за кожей во время рабочей поездки или отдыха: средство для умывания,
                    увлажняющий крем, крем для бритья, крем после бритья, шампунь. Набор
                    также может стать отличным подарком.',
                'available' => 1,
                'sku' => 'Dexter-ae',
                'price' => 290,
                'manufacturer_id' => 3,
                'category_id' => 2
            ),
            array(
                'name' => 'Глина для укладки волос «American crew»',
                'description' => '
                    Travel Kit – необходимый аксессуар во время любого путешествия.
                    В аккуратной кожаной сумке находится все, что нужно для бритья и ухода
                    за кожей во время рабочей поездки или отдыха: средство для умывания,
                    увлажняющий крем, крем для бритья, крем после бритья, шампунь. Набор
                    также может стать отличным подарком.',
                'available' => 1,
                'sku' => 'Dexter-ae',
                'price' => 500,
                'manufacturer_id' => 6,
                'category_id' => 2
            ),
            array(
                'name' => 'Гель для волос «American crew»',
                'description' => '
                    Travel Kit – необходимый аксессуар во время любого путешествия.
                    В аккуратной кожаной сумке находится все, что нужно для бритья и ухода
                    за кожей во время рабочей поездки или отдыха: средство для умывания,
                    увлажняющий крем, крем для бритья, крем после бритья, шампунь. Набор
                    также может стать отличным подарком.',
                'available' => 1,
                'sku' => 'Dexter-ae',
                'price' => 300,
                'manufacturer_id' => 6,
                'category_id' => 2
            ),
            array(
                'name' => 'Набор для бритья «Baxter of California»',
                'description' => '
                    Travel Kit – необходимый аксессуар во время любого путешествия.
                    В аккуратной кожаной сумке находится все, что нужно для бритья и ухода
                    за кожей во время рабочей поездки или отдыха: средство для умывания,
                    увлажняющий крем, крем для бритья, крем после бритья, шампунь. Набор
                    также может стать отличным подарком.',
                'available' => 1,
                'sku' => 'Dexter-ae',
                'price' => 300,
                'manufacturer_id' => 1,
                'category_id' => 3
            ),
            array(
                'name' => 'Набор для путешествий «Baxter of California»',
                'description' => '
                    Travel Kit – необходимый аксессуар во время любого путешествия.
                    В аккуратной кожаной сумке находится все, что нужно для бритья и ухода
                    за кожей во время рабочей поездки или отдыха: средство для умывания,
                    увлажняющий крем, крем для бритья, крем после бритья, шампунь. Набор
                    также может стать отличным подарком.',
                'available' => 1,
                'sku' => 'Dexter-ae',
                'price' => 2900,
                'manufacturer_id' => 1,
                'category_id' => 3
            ),
            array(
                'name' => 'Увлажняющий кондиционер «Baxter of California»',
                'description' => '
                    Travel Kit – необходимый аксессуар во время любого путешествия.
                    В аккуратной кожаной сумке находится все, что нужно для бритья и ухода
                    за кожей во время рабочей поездки или отдыха: средство для умывания,
                    увлажняющий крем, крем для бритья, крем после бритья, шампунь. Набор
                    также может стать отличным подарком.',
                'available' => 1,
                'sku' => 'Dexter-ae',
                'price' => 750,
                'manufacturer_id' => 1,
                'category_id' => 2
            ),
            array(
                'name' => 'Гель для волос «Suavecito»',
                'description' => '
                    Travel Kit – необходимый аксессуар во время любого путешествия.
                    В аккуратной кожаной сумке находится все, что нужно для бритья и ухода
                    за кожей во время рабочей поездки или отдыха: средство для умывания,
                    увлажняющий крем, крем для бритья, крем после бритья, шампунь. Набор
                    также может стать отличным подарком.',
                'available' => 1,
                'sku' => 'Dexter-ae',
                'price' => 290,
                'manufacturer_id' => 3,
                'category_id' => 2
            ),
            array(
                'name' => 'Глина для укладки волос «American crew»',
                'description' => '
                    Travel Kit – необходимый аксессуар во время любого путешествия.
                    В аккуратной кожаной сумке находится все, что нужно для бритья и ухода
                    за кожей во время рабочей поездки или отдыха: средство для умывания,
                    увлажняющий крем, крем для бритья, крем после бритья, шампунь. Набор
                    также может стать отличным подарком.',
                'available' => 1,
                'sku' => 'Dexter-ae',
                'price' => 500,
                'manufacturer_id' => 6,
                'category_id' => 2
            ),
            array(
                'name' => 'Гель для волос «American crew»',
                'description' => '
                    Travel Kit – необходимый аксессуар во время любого путешествия.
                    В аккуратной кожаной сумке находится все, что нужно для бритья и ухода
                    за кожей во время рабочей поездки или отдыха: средство для умывания,
                    увлажняющий крем, крем для бритья, крем после бритья, шампунь. Набор
                    также может стать отличным подарком.',
                'available' => 1,
                'sku' => 'Dexter-ae',
                'price' => 300,
                'manufacturer_id' => 6,
                'category_id' => 2
            ),
            array(
                'name' => 'Набор для бритья «Baxter of California»',
                'description' => '
                    Travel Kit – необходимый аксессуар во время любого путешествия.
                    В аккуратной кожаной сумке находится все, что нужно для бритья и ухода
                    за кожей во время рабочей поездки или отдыха: средство для умывания,
                    увлажняющий крем, крем для бритья, крем после бритья, шампунь. Набор
                    также может стать отличным подарком.',
                'available' => 1,
                'sku' => 'Dexter-ae',
                'price' => 300,
                'manufacturer_id' => 1,
                'category_id' => 3
            ),
        );

        // Заполнение таблицы начальными данными
        foreach ($products as $product) {
            $this->insert('products',array(
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'available' => $product['available'],
                    'sku' => $product['sku'],
                    'price' => $product['price'],
                    'manufacturer_id' => $product['manufacturer_id'],
                    'category_id' => $product['category_id']
                )
            );
        }
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
