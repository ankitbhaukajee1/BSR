<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation'=>true]); ?>


    <?= $form->field($model, 'company_name')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(\backend\models\Companies::find()->all(),'company_id','company_name'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
    'allowClear' => true
    ],
    ]);
    ?>


    <?= $form->field($model, 'company_email')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'company_address')->textInput(['maxlength' => 100]) ?>
    <?= $form->field($model, 'company_start_date')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-m-d'
            ]
        ]);?>

    <?= $form->field($model, 'company_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', '' => '', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
