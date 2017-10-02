<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vatandaskart".
 *
 * @property integer $ID
 * @property integer $KART_ID
 * @property integer $VATANDAS_ID
 *
 * @property Kart $kART
 * @property Vatandas $vATANDAS
 */
class Vatandaskart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vatandaskart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KART_ID', 'VATANDAS_ID'], 'required'],
            [['KART_ID', 'VATANDAS_ID'], 'integer'],
            [['KART_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Kart::className(), 'targetAttribute' => ['KART_ID' => 'ID']],
            [['VATANDAS_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Vatandas::className(), 'targetAttribute' => ['VATANDAS_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'KART_ID' => 'Kart  ID',
            'VATANDAS_ID' => 'Vatandas  ID',
			'vatandas.vatandasName'  => 'Vatandaş (Ad/Soyad)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKART()
    {
        return $this->hasOne(Kart::className(), ['ID' => 'KART_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVATANDAS()
    {
        return $this->hasOne(Vatandas::className(), ['ID' => 'VATANDAS_ID']);
    }
}
