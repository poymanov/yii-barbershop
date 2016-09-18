<?php

namespace app\models;

use app\models\Categories;
use Yii;
use php_rutils\RUtils;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $available
 * @property string $image
 * @property string $sku
 * @property string $price
 * @property integer $manufacturer_id
 * @property integer $category_id
 *
 * @property Categories $category
 * @property Manufacturers $manufacturer
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * Путь страницы каталога, для формирования url товаров
     */
   public $catalogUrl = '/catalog';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->slug = RUtils::translit()->slugify($this->name);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['description'], 'string'],
            [['available', 'manufacturer_id', 'category_id'], 'integer'],
            [['price'], 'number'],
            [['name', 'image', 'sku'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['manufacturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturers::className(), 'targetAttribute' => ['manufacturer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'description' => 'Описание',
            'available' => 'Доступность',
            'image' => 'Image',
            'sku' => 'Артикул',
            'price' => 'Цена',
            'manufacturer_id' => 'Manufacturer ID',
            'category_id' => 'Category ID',
            'slug' => 'ЧПУ'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
//        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
        return Categories::findOne($this->category_id);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturers::className(), ['id' => 'manufacturer_id']);
    }

    /**
     * Получение url для продукта, с учетом его категории
     */
    public function getProductUrl()
    {
        $category = $this->getCategory();
        return $this->catalogUrl."/".$category->slug."/".$this->slug;
    }
}
