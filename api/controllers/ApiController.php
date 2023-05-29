<?php

namespace api\controllers;

use common\models\Category;
use common\models\Post;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Api controller
 */
class ApiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionGet_users()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $models = User::find()->all();
        if ($models == null) {
            throw new NotFoundHttpException('Пользователи не найдены');
        }
        return $models;
    }

    public function actionGet_user($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = User::findIdentity($id);
        if ($model == null) {
            throw new NotFoundHttpException('Пользователь не найден');
        }
        return ArrayHelper::toArray($model);
    }

    public function actionGet_posts()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $posts = Post::find()->all();
        foreach ($posts as $post) {
            $post->category = $post->category0->title;
            $post->autor = $post->autor0->username;
        }
        if ($posts == null) {
            throw new NotFoundHttpException('Посты не найдены');
        }
        return $posts;
    }

    public function actionGet_post($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $post = Post::findOne($id);
        $post->category = $post->category0->title;
        $post->autor = $post->autor0->username;

        if ($post == null) {
            throw new NotFoundHttpException('Пост не найден');
        }
        return $post;
    }
}