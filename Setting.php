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
        $cache = Yii::$app->cache;

        $exist = $cache->exists("setting_" . $code);
        $value = "";
        if ($exist) {
            $value = $cache->get("setting_" . $code);
        } else {
            $setting = \zhangyc310\setting\models\Setting::find()->where(['code' => $code])->one();
            $value   = $setting->value;
            $cache->set('setting_' . $code, $value);
        }
        return $value;
    }

}
