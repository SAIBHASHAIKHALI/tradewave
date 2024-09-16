<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property int $vendor_id
 * @property string $name
 * @property string $email
 * @property int $contact
 * @property string $pan
 * @property string $gstin
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $is_deleted
 *
 * @property Purchase[] $purchases
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'contact', 'pan', 'gstin'], 'required'],
            [['contact', 'is_deleted'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
            [['email'], 'unique'],
            [['pan'], 'string', 'max' => 10], // Assuming PAN can have maximum 10 characters
            [['pan'], 'match', 'pattern' => '/^(?=.*[a-zA-Z])[a-zA-Z0-9]*$/', 'message' => 'PAN should contain alphanumeric character.'], // Ensuring PAN contains at least one alphabetic character
            [['pan'], 'unique'],
            [['gstin'], 'string', 'max' => 15], // Assuming GSTIN can have maximum 15 characters
            [['gstin'], 'unique'],
            [['contact'], 'unique'],
        ];
    }
    


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vendor_id' => 'Vendor ID',
            'name' => 'Name',
            'email' => 'Email',
            'contact' => 'Contact',
            'pan' => 'Pan',
            'gstin' => 'Gstin',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * Gets query for [[Purchases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchases()
    {
        return $this->hasMany(Purchase::className(), ['vendor_id' => 'vendor_id']);
    }
}
