<?php

namespace app\modules\lp\models;

use Yii;
use yii\db\Query;
use yii\data\ActiveDataProvider;

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
     * @return void
     */
    public function sample()
    {
        $query = new Query();
        $dataProvider = new ActiveDataProvider([
            'query' => $query->select(['pages.id AS pages_id', 'pages.domain', 'pages_widgets_whatsapp.id', 'pages_widgets_whatsapp.phone', 'pages_widgets_whatsapp.label',
            'pages_widgets_whatsapp.pulse'])->from('pages')->innerJoin('pages_widgets_whatsapp',
             'pages.id = pages_widgets_whatsapp.page_id'),
        ]);
        return $dataProvider;
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

    /**
     * @param mixed $label
     * 
     * @return void
     */
    public function isLabel($label)
    {
        if (empty($label)) {
            echo "<style> #whatsappFixedWidgetTooltip {display:none;} </style>";
        }

    }

    /**
     * @param mixed $pulse
     * 
     * @return void
     */
    public function isPulse($pulse)
    {
        if ($pulse == 1) {
            echo "<style> #imgwhatsapp {animation: radial-pulse 1s infinite;} </style>";
        }

    }

    /**
     * @param mixed $phone
     * 
     * @return void
     */
    public function printPhone($phone)
    {
        if ($phone) {
            $phone = (int) $phone;
        }
        return $phone;
    }
}
