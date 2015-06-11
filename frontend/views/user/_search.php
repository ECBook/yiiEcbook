<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\search\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'auth_key') ?>

    <?= $form->field($model, 'password_hash') ?>

    <?= $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'benutzergruppe') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'vorname') ?>

    <?php // echo $form->field($model, 'nachname') ?>

    <?php // echo $form->field($model, 'geburtsdatum') ?>

    <?php // echo $form->field($model, 'istKlassenvorstand') ?>

    <?php // echo $form->field($model, 'wohnadresse') ?>

    <?php // echo $form->field($model, 'telefonnummer') ?>

    <?php // echo $form->field($model, 'ort') ?>

    <?php // echo $form->field($model, 'plz') ?>

    <?php // echo $form->field($model, 'Abteilung_abt_bezeichnung') ?>

    <?php // echo $form->field($model, 'Eltern_e_id') ?>

    <?php // echo $form->field($model, 'istKlassensprecher') ?>

    <?php // echo $form->field($model, 'Klasse_k_name') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
