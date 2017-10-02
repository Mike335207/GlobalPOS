<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "esnaf".
 *
 * @property integer $ID
 * @property string $VERGI_NO
 * @property string $AD
 * @property string $ADRESS
 * @property integer $BOLGE_ID
 * @property integer $SECTOR_ID
 *
 * @property Bolge $bOLGE
 * @property Sektor $sECTOR
 * @property Esnafpos[] $esnafpos
 */
class Esnaf extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'esnaf';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VERGI_NO', 'AD', 'ADRESS', 'BOLGE_ID', 'SECTOR_ID'], 'required'],
            [['BOLGE_ID', 'SECTOR_ID'], 'integer'],
            [['VERGI_NO'], 'string', 'max' => 20],
            [['AD'], 'string', 'max' => 100],
            [['ADRESS'], 'string', 'max' => 150],
            [['BOLGE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Bolge::className(), 'targetAttribute' => ['BOLGE_ID' => 'BOLGE_ID']],
            [['SECTOR_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Sektor::className(), 'targetAttribute' => ['SECTOR_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'VERGI_NO' => 'Vergi No',
            'AD' => 'Firma Unvanı',
            'ADRESS' => 'Adres',
            'BOLGE_ID' => 'Bolge ID',
            'SECTOR_ID' => 'Sector ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBOLGE()
    {
        return $this->hasOne(Bolge::className(), ['BOLGE_ID' => 'BOLGE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSECTOR()
    {
        return $this->hasOne(Sektor::className(), ['ID' => 'SECTOR_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEsnafpos()
    {
        return $this->hasMany(Esnafpos::className(), ['ESNAF_ID' => 'ID']);
    }
	
	public function getPos()
    {
		 return $this->hasOne(Pos::className(), ['ID' => 'POS_ID'])
            ->viaTable('esnafpos', ['ESNAF_ID' => 'ID']);
	}
}
