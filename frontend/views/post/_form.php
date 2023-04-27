<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Post $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'autor')->textInput()->dropDownList(\yii\helpers\ArrayHelper::map($autor, 'id', 'username')) ?>

    <?= $form->field($model, 'category')->textInput()->dropDownList(\yii\helpers\ArrayHelper::map($category, 'id', 'title'))  ?>

    <?= $form->field($model, 'body')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'data_publish')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_update')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
