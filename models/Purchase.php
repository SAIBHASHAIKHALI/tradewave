<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase".
 *
 * @property int $purchase_id
 * @property int $vendor_id
 * @property string $item
 * @property string $hsn
 * @property string $paymentstatus
 * @property float $amount
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $is_deleted
 *
 * @property Vendor $vendor
 */
class Purchase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchase';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vendor_id', 'item', 'paymentstatus', 'amount'], 'required'],
            [['vendor_id', 'is_deleted'], 'integer'],
            [['amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['item'], 'string', 'max' => 100],
            [['hsn', 'paymentstatus'], 'string', 'max' => 20],
            [['vendor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vendor::className(), 'targetAttribute' => ['vendor_id' => 'vendor_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'purchase_id' => 'Purchase ID',
            'vendor_id' => 'Vendor ID',
            'item' => 'Item',
            'hsn' => 'Hsn',
            'paymentstatus' => 'Paymentstatus',
            'amount' => 'Amount',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_deleted' => 'Is Deleted',
        ];
    }

    /**
     * Gets query for [[Vendor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVendor()
    {
        return $this->hasOne(Vendor::className(), ['vendor_id' => 'vendor_id']);
    }
}
