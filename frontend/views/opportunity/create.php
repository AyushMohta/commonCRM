<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Plan;
?>

<?php $id = $_GET['id']; ?>

<div class="opportunity-create">

    <?php $form = ActiveForm::begin(); ?>

        <?php if(!$id) : ?>
        <?= $form->field($person, 'name') ?>
        <?= $form->field($person, 'gender') ?>
        <?= $form->field($person, 'date_of_birth') ?>
        <?= $form->field($person, 'email') ?>
        <?= $form->field($person, 'contact_no') ?>
        <?= $form->field($person, 'address') ?>
        <?php endif; ?>
        <?= $form->field($opportunity, 'plan_id')->dropDownList(
            Plan::find()
            ->select(['plan_name', 'plan_id'])
            ->indexBy('plan_id')
            ->column(), ['prompt' => 'Select Plan']
        ); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- opportunity-create -->
