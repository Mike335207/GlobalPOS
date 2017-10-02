<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pos".
 *
 * @property integer $ID
 * @property string $POS_ID
 * @property integer $BOLGE_ID
 *
 * @property Esnafpos[] $esnafpos
 * @property Odeme[] $odemes
 * @property Bolge $bOLGE
 */
class Pos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['POS_ID'], 'required'],
            [['BOLGE_ID'], 'integer'],
            [['POS_ID'], 'string', 'max' => 20],
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
            'POS_ID' => 'Pos Numarası',
            'BOLGE_ID' => 'Bolge  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEsnafpos()
    {
        return $this->hasMany(Esnafpos::className(), ['POS_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOdemes()
    {
        return $this->hasMany(Odeme::className(), ['POS_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBOLGE()
    {
        return $this->hasOne(Bolge::className(), ['BOLGE_ID' => 'BOLGE_ID']);
    }
	
	  public function getEsnaf()
    {
       	 return $this->hasOne(Esnaf::className(), ['ID' => 'ESNAF_ID'])
            ->viaTable('esnafpos', ['POS_ID' => 'ID']);
    }
}
