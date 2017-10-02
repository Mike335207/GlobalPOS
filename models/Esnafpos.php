<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "esnafpos".
 *
 * @property integer $ID
 * @property integer $ESNAF_ID
 * @property integer $POS_ID
 *
 * @property Esnaf $eSNAF
 * @property Pos $pOS
 */
class Esnafpos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'esnafpos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ESNAF_ID', 'POS_ID'], 'required'],
            [['ESNAF_ID', 'POS_ID'], 'integer'],
            [['ESNAF_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Esnaf::className(), 'targetAttribute' => ['ESNAF_ID' => 'ID']],
            [['POS_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Pos::className(), 'targetAttribute' => ['POS_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ESNAF_ID' => 'Esnaf  ID',
            'POS_ID' => 'Pos  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getESNAF()
    {
        return $this->hasOne(Esnaf::className(), ['ID' => 'ESNAF_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPOS()
    {
        return $this->hasOne(Pos::className(), ['ID' => 'POS_ID']);
    }
}
