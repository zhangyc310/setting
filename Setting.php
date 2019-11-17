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

        $setting = \zhangyc310\setting\models\Setting::find()->where(['code' => $code])->one();

        if ($setting) {
            return $setting->value;
        } else {
            return;
        }

    }

}
