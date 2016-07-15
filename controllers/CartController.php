<?php
/**
 * Created by PhpStorm.
 * User: nikolay
 * Date: 15.07.16
 * Time: 20:15
 */

namespace app\controllers;
use app\models\Products;
use Yii;
use yii\web\Controller;


class CartController extends Controller
{

    public function actionIndex() {

        // Получение товаров из корзины
        $session = Yii::$app->session;
        $session->open();

        return $this->render('index',['cart' => $session['cart']]);
    }

    public function actionAdd($id, $qty = 1)
    {
        $product = Products::findOne($id);

        // Если такой товар не найден
        if (!$product) {


            if (Yii::$app->request->isAjax) {
                // Товар не добавлен в корзину
                return json_encode(
                    [
                        'msgHeader' => 'Корзина товаров',
                        'msgText' => 'Ошибка добавления :(',
                    ]
                );
            } else {
                throw new \yii\web\HttpException('404','Товар не существует');
                return;
            }

        }

        // Добавление в сессию
        $session = Yii::$app->session;
        $session->open();

        // Если корзины нет в сессии, добавляем её
        if (!isset($session['cart'])) {
            $session['cart'] = [];
        }

        // Проверяем, есть ли такой товар в корзине

        if (isset($session['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        } else {
            // Добавляем найденный товар в корзину
            $_SESSION['cart'][$product->id] = [
                'name' => $product->name,
                'qty' => $qty,
                'price' => $product->price
            ];
        }

        if (Yii::$app->request->isAjax) {
            // Товар добавлен в корзину
            return json_encode(
                [
                    'msgHeader' => 'Корзина товаров',
                    'msgText' => 'Товар успешно добавлен!',
                ]
            );
        } else {
            // Переадресация на страницу с корзиной
            return $this->redirect('/cart');
        }


    }

    public function actionRemove($id) {

        $product = Products::findOne($id);

        // Если такой товар не найден
        if (!$product) {
            throw new \yii\web\HttpException('404','Товар не существует');
            return;
        }

        // Добавление в сессию
        $session = Yii::$app->session;
        $session->open();

        // Если корзины нет в сессии, возвращаем обратно на страницу с корзиной
        if (!isset($session['cart'])) {
            return $this->redirect('/cart');
        }

        unset($_SESSION['cart'][$id]);
        return $this->redirect('/cart');
    }

    public function actionClear()
    {
        // Добавление в сессию
        $session = Yii::$app->session;
        $session->open();

        // Если корзины нет в сессии, возвращаемся на страницу с корзиной
        if (!isset($session['cart'])) {
            $this->redirect('index');
        }

        // Удаляем корзину
        $session->remove('cart');
        return $this->redirect('/cart');

    }

    public function actionChange($id,$qty) {
        // только ajax
        if (!Yii::$app->request->isAjax) {
            return $this->redirect('cart');
        }

        $product = Products::findOne($id);

        // Если такой товар не найден
        if (!$product) {
            return $this->redirect('cart');
        }

        // Если количество <= 0  то ничего не меняем
        if ($qty <= 0 ) {
            return $this->redirect('/cart');
        }

        $session = Yii::$app->session;
        $session->open();

        $_SESSION['cart'][$id]['qty'] = $qty;

        return $this->redirect('/cart');
    }

}

