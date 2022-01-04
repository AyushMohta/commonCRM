<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container">
    <div class="starter-template">
        <div class="page-header-extended">
            <h2 class="page-title"><strong>ADD PLAN</strong> 👇</h2>
        </div>

        <div style="margin-left:40%;">
        <?php $form = ActiveForm::begin() ?>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-12">
                    <?= $form->field($plan,'plan_name'); ?>
                </div>
            </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= $form->field($plan,'plan_validity'); ?>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= $form->field($plan,'plan_data'); ?>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= $form->field($plan,'plan_price'); ?>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= Html::submitButton('Update',['class'=>'btn btn-primary']); ?>
            </div>
        </div>
        </div>

        <?php ActiveForm::end() ?>
        </div>
    </div>
</div>