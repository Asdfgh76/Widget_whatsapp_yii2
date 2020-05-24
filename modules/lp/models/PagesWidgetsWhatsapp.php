<?php

namespace app\modules\lp\models;

use Yii;

/**
 * This is the model class for table "pages_widgets_whatsapp".
 *
 * @property int $id
 * @property int $page_id
 * @property string $phone
 * @property int|null $pulse
 * @property string|null $label
 *
 * @property Pages $page
 */
class PagesWidgetsWhatsapp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages_widgets_whatsapp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'phone'], 'required'],
            [['page_id', 'pulse'], 'integer'],
            [['phone'], 'string', 'max' => 20],
            [['label'], 'string', 'max' => 255],
            [['page_id'], 'unique'],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pages::className(), 'targetAttribute' => ['page_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_id' => 'Адрес страницы',
            'phone' => 'Номер телефона',
            'pulse' => 'Пульсация',
            'label' => 'Текст пояснения',
        ];
    }

    /**
     * Gets query for [[Page]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Pages::className(), ['id' => 'page_id']);
    }
}
