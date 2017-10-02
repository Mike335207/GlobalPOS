<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sektor".
 *
 * @property integer $ID
 * @property string $SECTOR_NAME
 *
 * @property Esnaf[] $esnafs
 */
class Sektor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sektor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SECTOR_NAME'], 'required'],
            [['SECTOR_NAME'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'Sektör Kodu',
            'SECTOR_NAME' => 'Sektör Adı',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEsnafs()
    {
        return $this->hasMany(Esnaf::className(), ['SECTOR_ID' => 'ID']);
    }
}
