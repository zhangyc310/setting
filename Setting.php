<?php

namespace zhangyc310\setting;

use Yii;

class Setting extends \yii\base\Component
{
    public function get($code)
    {
        if (!$code) {
            return;
        }
        $cache = \YII::$app->cache;

        $exist = $cache->exists("setting_" . $code);
        $value = "";
        if ($exist) {
            $value = $cache->get("setting_" . $code);
        } else {
            $value = \zhangyc310\setting\models\Setting::find()->where(['code' => $code])->one();
            // return;
        }
        return $value;
    }

}
