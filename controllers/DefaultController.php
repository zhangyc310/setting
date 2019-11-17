<?php

namespace zhangyc310\setting\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use zhangyc310\setting\models\Setting;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        //if(!Yii::$app->user->can('readPost')) throw new HttpException(403, 'No Auth');

        if (Yii::$app->request->isPost) {
            $setting = Yii::$app->request->post('Setting');
            $cache   = \YII::$app->cache;
            foreach ($setting as $key => $value) {
                Setting::updateAll(['value' => $value], ['code' => $key]);
                Yii::trace($value, "updateAll: code: " . $key);
                $cache->add('setting_' . $key, $value);
            }
        }

        $settingParent = Setting::find()->where(['parent_id' => 0])->orderBy(['sort_order' => SORT_ASC])->all();
        return $this->render('index', [
            'settingParent' => $settingParent,
        ]);
    }
}
