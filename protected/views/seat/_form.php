<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seat-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rSchedule'); ?>
		<?php echo $form->textField($model,'rSchedule'); ?>
		<?php echo $form->error($model,'rSchedule'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no'); ?>
		<?php echo $form->textField($model,'no'); ?>
		<?php echo $form->error($model,'no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seatCondition'); ?>
		<?php echo $form->textField($model,'seatCondition',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'seatCondition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateCreted'); ?>
		<?php echo $form->textField($model,'dateCreted'); ?>
		<?php echo $form->error($model,'dateCreted'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->