<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'color') ?>
    <?php
            echo $form->field($model, 'user_id')->widget(Select2::classname(), [
            'data' => $userDropDown,
            'options' => ['placeholder' => 'select the userName ...'],
            'pluginOptions' => [
            'allowClear' => true,
            ],
            ]);
            ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>




