<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property int|null $autor
 * @property int|null $category
 * @property string $body
 * @property int $price
 * @property string $data_publish
 * @property string $data_update
 *
 * @property User $autor0
 * @property Category $category0
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'body', 'price', 'data_publish', 'data_update'], 'required'],
            [['autor', 'category', 'price'], 'integer'],
            [['title', 'body', 'data_publish', 'data_update'], 'string', 'max' => 255],
            [['autor'], 'unique'],
            [['autor'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['autor' => 'id']],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'autor' => 'Автор',
            'category' => 'Категория',
            'body' => 'Содержание',
            'price' => 'Цена',
            'data_publish' => 'Дата публикации',
            'data_update' => 'Дата обновления   ',
        ];
    }

    /**
     * Gets query for [[Autor0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutor0()
    {
        return $this->hasOne(User::class, ['id' => 'autor']);
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::class, ['id' => 'category']);
    }
}
