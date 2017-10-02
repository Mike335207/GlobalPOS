<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "talimat".
 *
 * @property integer $ID
 * @property string $TARIH
 * @property string $TALIMAT_TARIH
 * @property string $TUTAR
 * @property integer $KULLANICI_ID
 * @property string $ACIKLAMA
 *
 * @property Odeme[] $odemes
 * @property User $kULLANICI
 */
class Talimat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'talimat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TARIH', 'TALIMAT_TARIH', 'TUTAR', 'KULLANICI_ID', 'ACIKLAMA'], 'required'],
            [['TARIH', 'TALIMAT_TARIH'], 'safe'],
            [['TUTAR'], 'number'],
            [['KULLANICI_ID'], 'integer'],
            [['ACIKLAMA'], 'string', 'max' => 256],
            [['KULLANICI_ID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['KULLANICI_ID' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TARIH' => 'Kayıt Tarihi',
            'TALIMAT_TARIH' => 'Talimat Tarihi',
            'TUTAR' => 'Yükleme Tutarı',
            'KULLANICI_ID' => 'Kullanici ID',
            'ACIKLAMA' => 'Açıklama',
			'kULLANICI.userName' => 'Kaydeden Kullanıcı',
			'vatandas.vatandasName'  => 'Vatandaş (Ad/Soyad)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOdemes()
    {
        return $this->hasMany(Odeme::className(), ['TALIMAT_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKULLANICI()
    {
        return $this->hasOne(User::className(), ['id' => 'KULLANICI_ID']);
    }
	
	 public function getKULLANICINAME()
    {
        return $this->getKULLANICI().Name;
    }
}
