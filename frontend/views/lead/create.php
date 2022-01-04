<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container">
    <div class="starter-template">
        <div class="page-header-extended">
            <h2 class="page-title"><strong>ADD LEAD</strong> 👇</h2>
        </div>

        <div style="margin-left:40%;">
        <?php $form = ActiveForm::begin() ?>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-12">
                    <?= $form->field($person,'name'); ?>
                </div>
            </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= $form->field($person,'gender'); ?>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= $form->field($person,'contact_no'); ?>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= $form->field($person,'date_of_birth'); ?>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= $form->field($person,'email'); ?>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="form-group">
            <div class="col-lg-12">
            <?= $form->field($person,'address'); ?>
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