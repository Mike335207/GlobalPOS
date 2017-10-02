<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vatandas".
 *
 * @property integer $ID
 * @property string $TC_NO
 * @property string $AD
 * @property string $SOYAD
 * @property string $DOGUM_TARIHI
 * @property integer $BOLGE_ID
 *
 * @property Bolge $bOLGE
 */
class Vatandas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vatandas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TC_NO', 'AD', 'SOYAD', 'DOGUM_TARIHI', 'BOLGE_ID'], 'required'],
            [['DOGUM_TARIHI'], 'safe'],
            [['BOLGE_ID'], 'integer'],
            [['TC_NO'], 'string', 'max' => 12],
            [['AD', 'SOYAD'], 'string', 'max' => 50],
            [['BOLGE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Bolge::className(), 'targetAttribute' => ['BOLGE_ID' => 'BOLGE_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TC_NO' => 'TC  No',
            'AD' => 'Ad',
            'SOYAD' => 'Soyad',
            'DOGUM_TARIHI' => 'Doğum Tarihi',
            'BOLGE_ID' => 'Bölge',
			'BOLGE_ADI' => 'Bölge Adı',
			'vatandas.vatandasName'  => 'Vatandaş (Ad/Soyad)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBOLGE()
    {
        return $this->hasOne(Bolge::className(), ['BOLGE_ID' => 'BOLGE_ID']);
    }
	
    public function getVatandasName()
    {
        return $this->AD." ".$this->SOYAD;
    }
	
	public function getKart()
    {
		 return $this->hasOne(Kart::className(), ['ID' => 'KART_ID'])
            ->viaTable('vatandaskart', ['VATANDAS_ID' => 'ID']);
    }
	
}
