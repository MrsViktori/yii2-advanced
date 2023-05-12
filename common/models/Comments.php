<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string $username
 * @property int|null $post
 * @property string $body
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Post $post0
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'body', 'created_at', 'updated_at'], 'required'],
            [['post'], 'integer'],
            [['username', 'body', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['post'], 'exist', 'skipOnError' => true, 'targetClass' => Post::class, 'targetAttribute' => ['post' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Никнейм',
            'post' => 'Пост',
            'body' => 'Описание',
            'created_at' => 'Создан в',
            'updated_at' => 'Обновлен в',
        ];
    }

    /**
     * Gets query for [[Post0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPost0()
    {
        return $this->hasOne(Post::class, ['id' => 'post']);
    }
}
