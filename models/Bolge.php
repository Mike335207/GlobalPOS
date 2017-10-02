<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bolge".
 *
 * @property integer $BOLGE_ID
 * @property string $BOLGE_ADI
 *
 * @property Esnaf[] $esnafs
 * @property Kart[] $karts
 * @property Pos[] $pos
 * @property Vatandas[] $vatandas
 */
class Bolge extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bolge';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BOLGE_ADI'], 'required'],
            [['BOLGE_ADI'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'BOLGE_ID' => 'Bolge  ID',
            'BOLGE_ADI' => 'Bolge  Adi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEsnafs()
    {
        return $this->hasMany(Esnaf::className(), ['BOLGE_ID' => 'BOLGE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarts()
    {
        return $this->hasMany(Kart::className(), ['BOLGE_ID' => 'BOLGE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPos()
    {
        return $this->hasMany(Pos::className(), ['BOLGE_ID' => 'BOLGE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVatandas()
    {
        return $this->hasMany(Vatandas::className(), ['BOLGE_ID' => 'BOLGE_ID']);
    }
}
