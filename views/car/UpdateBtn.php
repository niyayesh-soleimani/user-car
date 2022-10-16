
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name')->textInput()->hint('Please enter your name')->label('نام'); ?>
<?= $form->field($model, 'color')->textInput()->hint('Please enter address')->label('رنگ') ;?>
<?= Html::submitButton('submit', ['class' => 'btn btn-primary']); 
?>
<?php $form = ActiveForm::end(); ?>