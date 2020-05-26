<?php

namespace app\modules\lp\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string|null $domain
 *
 * @property PagesWidgetsWhatsapp $pagesWidgetsWhatsapp
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['domain'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain' => 'Domain',
        ];
    }

    /**
     * Gets query for [[PagesWidgetsWhatsapp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagesWidgetsWhatsapp()
    {
        return $this->hasOne(PagesWidgetsWhatsapp::className(), [
            'page_id' => 'id'
            ]);
    }
}
