<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kart".
 *
 * @property integer $ID
 * @property string $KART_NO
 * @property integer $BOLGE_ID
 * @property string $TIP
 *
 * @property Bolge $bOLGE
 */
class Kart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $reportStartDate;
    public $reportFinDate;


    public static function tableName()
    {
        return 'kart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KART_NO', 'BOLGE_ID', 'TIP'], 'required'],
            [['BOLGE_ID'], 'integer'],
            [['TIP'], 'string'],
            [['KART_NO'], 'string', 'max' => 20],
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
            'KART_NO' => 'Kart  No',
            'BOLGE_ID' => 'Bolge  ID',
            'TIP' => 'Kart Tipi',
			 'balance' => 'Bakiye (TL)',
			 'bOLGE.BOLGE_ADI' => 'Bölge',
			 'vatandas.vatandasName' => 'Vatandaş',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBOLGE()
    {
        return $this->hasOne(Bolge::className(), ['BOLGE_ID' => 'BOLGE_ID']);
    }
	
	public function getBalance()
    {
        $date = date('Y-m-d');
		if ($this->hasMany(Odeme::className(), ['KART_ID' => 'ID'])->count() > 0)
		{
			return $this->hasMany(Odeme::className(), ['KART_ID' => 'ID'])->andWhere(['<=', 'TARIH', $date])->sum('TUTAR');
		}else return 0.00;
	}
	
	public function getVatandas()
    {
		 return $this->hasOne(Vatandas::className(), ['ID' => 'VATANDAS_ID'])
            ->viaTable('vatandaskart', ['KART_ID' => 'ID']);
    }
	
	public function isUsed()
    {
        return $this->hasMany(Odeme::className(), ['KART_ID' => 'ID'])->count();
	}
	
}
