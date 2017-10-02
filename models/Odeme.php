<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "odeme".
 *
 * @property integer $ID
 * @property integer $POS_ID
 * @property integer $KART_ID
 * @property string $TARIH
 * @property double $TUTAR
 */
class Odeme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'odeme';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KART_ID', 'TUTAR'], 'required'],
            [['POS_ID', 'KART_ID'], 'integer'],
            [['TARIH'], 'safe'],
            [['TUTAR'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'POS_ID' => 'Pos  ID',
            'KART_ID' => 'Kart  Numarası',
            'TARIH' => 'İşlem Tarih',
            'TUTAR' => 'Ödeme Tutarı (TL)',
			'vatandas.vatandasName' => 'Vatandaş',
        ];
    }
	
	public function getPos()
    {
		  return $this->hasOne(Pos::className(), ['ID' => 'POS_ID']);
	}
	
	public function getKart()
    {
		  return $this->hasOne(Kart::className(), ['ID' => 'KART_ID']);
	}
	
	public function getVatandas()
    {	
			 return $this->hasOne(Vatandas::className(), ['ID' => 'VATANDAS_ID'])
            ->viaTable('vatandaskart', ['KART_ID' => 'KART_ID']);
	}
	
	public function getEsnaf()
    {	
			 return $this->hasOne(Esnaf::className(), ['ID' => 'ESNAF_ID'])
            ->viaTable('esnafpos', ['POS_ID' => 'POS_ID']);
	}
	
	
}
