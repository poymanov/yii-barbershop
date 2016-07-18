<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Orders;

class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;

        $orders = Orders::find()->with('ordersItems')->where(['user_id' => $user_id])->all();

        return $this->render('index',['orders' => $orders]);
    }

    public function actionOrder($id)
    {
        $user_id = Yii::$app->user->id;
        $order = Orders::find()->with('ordersItems')->where(['id' => $id,'user_id' => $user_id])->one();

        if (empty($order)) {
            throw new \yii\web\HttpException('404','Заказ не найден');
            return;
        }

        return $this->render('order',['order' => $order]);
    }
}