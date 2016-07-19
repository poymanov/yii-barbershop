<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Orders;
use app\models\EditInfoForm;

class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'order'],
                'rules' => [
                    [
                        'actions' => ['index', 'order'],
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

    public function actionInfo() {

        $model = new EditInfoForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($model->saveUserData()) {
                Yii::$app->session->setFlash('success','Данные успешно обновлены');
            }

            return $this->redirect(['info']);
        }

        return $this->render('info',['model' => $model]);
    }
}