<?php

use common\models\InfoPublic;
use kartik\file\FileInput;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\InfoPublic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-body">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'fullSpan' => 8,
    ]); ?>
    <?php if ($model->isNewRecord) { ?>
    <?= $form->field($model, 'image_header')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showPreview' => true,
            'overwriteInitial' => false,
            'showRemove' => false,
            'showUpload' => false
        ]
    ]); ?>
    <?php } else { ?>
        <?= $form->field($model, 'image_header')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'previewFileType' => 'any',
                'initialPreview' => [
                    Html::img(Url::to(InfoPublic::getImage($model->image_header)), ['class' => 'file-preview-image', 'alt' => $model->image_header, 'title' => $model->image_header]),
                ],
                'showPreview' => true,
                'initialCaption' => InfoPublic::getImage($model->image_header),
                'overwriteInitial' => true,
                'showRemove' => false,
                'showUpload' => false
            ]
        ]); ?>
    <?php } ?>
    <?php if ($model->isNewRecord) { ?>
    <?= $form->field($model, 'image_footer')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showPreview' => true,
            'overwriteInitial' => false,
            'showRemove' => false,
            'showUpload' => false
        ]
    ]); ?>
    <?php } else { ?>
        <?= $form->field($model, 'image_footer')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'previewFileType' => 'any',
                'initialPreview' => [
                    Html::img(Url::to(InfoPublic::getImage($model->image_footer)), ['class' => 'file-preview-image', 'alt' => $model->image_footer, 'title' => $model->image_footer]),
                ],
                'showPreview' => true,
                'initialCaption' =>InfoPublic::getImage($model->image_footer),
                'overwriteInitial' => true,
                'showRemove' => false,
                'showUpload' => false
            ]
        ]); ?>
    <?php } ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link_face')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(InfoPublic::getListStatus()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app','Tạo mới') : Yii::t('app','Cập nhật'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>