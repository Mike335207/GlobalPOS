<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "talimatdetay".
 *
 * @property integer $ID
 * @property integer $TALIMAT_ID
 * @property integer $KART_ID
 */
class Talimatdetay extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'talimatdetay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'TALIMAT_ID', 'KART_ID'], 'required'],
            [['ID', 'TALIMAT_ID', 'KART_ID'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TALIMAT_ID' => 'Talimat  ID',
            'KART_ID' => 'Kart  ID',
        ];
    }
}
