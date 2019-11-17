<?php

namespace zhangyc310\setting\models;

use Yii;
use zhangyc310\setting\Module;

/**
 * This is the model class for table "setting".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $code
 * @property string $code_desc
 * @property string $type
 * @property string $store_range
 * @property string $store_dir
 * @property string $value
 * @property integer $sort_order
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort_order'], 'integer'],
            [['code', 'type'], 'required'],
            [['value', 'code_desc'], 'string'],
            [['code', 'type'], 'string', 'max' => 32],
            [['store_range', 'store_dir'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => Module::t('setting', 'ID'),
            'parent_id'   => Module::t('setting', 'Parent ID'),
            'code'        => Module::t('setting', 'Code'),
            'code_desc'   => Module::t('setting', 'Code Desc'),
            'type'        => Module::t('setting', 'Type'),
            'store_range' => Module::t('setting', 'Store Range'),
            'store_dir'   => Module::t('setting', 'Store Dir'),
            'value'       => Module::t('setting', 'Value'),
            'sort_order'  => Module::t('setting', 'Sort Order'),
        ];
    }
}
