<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['category_id' => 'id']);
    }

    // public static function getCountArticles()
    // {
    //     $category = null;

    //     return Yii::$app->db->createCommand('SELECT COUNT(*) FROM article WHERE :category_id')
    //             ->bindParam(':category_id', $category);

    //     $cat = self::find()->asArray()->all();
    //     var_dump($cat);die;
    //       foreach ($cat as $c) {

    //         $category = $c->id;
    //         $command->queryAll();
    //       }

    //         return $categ;
    // }
}
