<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PostSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'title', )->textInput(['placeholder' => 'Искать по заговолку'])?>

    <?= $form->field($model, 'autor')->textInput(['placeholder' => 'Искать по автору']) ?>

    <?= $form->field($model, 'category')->textInput(['placeholder' => 'Искать по категории']) ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'data_publish') ?>

    <?php // echo $form->field($model, 'data_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
