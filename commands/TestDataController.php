<?php


namespace app\commands;

use app\models\Categories;
use yii\console\Controller;
use php_rutils\RUtils;
use app\models\Manufacturers;
use app\models\Products;

class TestDataController extends Controller
{

    public function actionIndex()
    {
        echo 'yii test-data/catalog - load to DB categories, manufacturers, products' . PHP_EOL;
    }

    public function actionCatalog()
    {

        echo "------ Load manufacturers" . PHP_EOL;

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

            $newManufacturer = new Manufacturers();
            $newManufacturer->name = $manufacturer;
            $newManufacturer->slug = RUtils::translit()->slugify($manufacturer);
            $newManufacturer->save();
        }

        echo "------ Load categories" . PHP_EOL;

        // Начальные данные
        $categories = array('Бритвенные принадлежности', 'Средства для ухода', 'Аксессуары');
        
        // Заполнение таблицы начальными данными
        foreach ($categories as $category) {
            $newCategory = new Categories();
            $newCategory->name = $category;
            $newCategory->slug = RUtils::translit()->slugify($category);
            $newCategory->save();
        }

        echo "------ Load products" . PHP_EOL;

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

            $newProduct = new Products();
            $newProduct->name = $product['name'];
            $newProduct->slug = RUtils::translit()->slugify($product['name']);
            $newProduct->description = $product['description'];
            $newProduct->available = $product['available'];
            $newProduct->sku = $product['sku'];
            $newProduct->price = $product['price'];
            $newProduct->manufacturer_id = $product['manufacturer_id'];
            $newProduct->category_id = $product['category_id'];
            $newProduct->save();

        }

        echo "------ Load complete" . PHP_EOL;
    }

}
