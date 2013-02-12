<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seat-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>
	<?php $title='';?>
	<div class="row">
		<?php //echo $form->labelEx($model,'scheduleId'); ?>
		<?php echo $form->textField('test','scheduleId'); ?>
		<?php //echo $form->error($model,'scheduleId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->