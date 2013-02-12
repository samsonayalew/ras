<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schedule-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rMovie'); ?>
		<?php echo $form->textField($model,'rMovie'); ?>
		<?php echo $form->error($model,'rMovie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rCinema'); ?>
		<?php echo $form->textField($model,'rCinema'); ?>
		<?php echo $form->error($model,'rCinema'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dayOfTheWeek'); ?>
		<?php echo $form->textField($model,'dayOfTheWeek'); ?>
		<?php echo $form->error($model,'dayOfTheWeek'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'startTime'); ?>
		<?php echo $form->textField($model,'startTime',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'startTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'endTime'); ?>
		<?php echo $form->textField($model,'endTime',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'endTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateCreated'); ?>
		<?php echo $form->textField($model,'dateCreated'); ?>
		<?php echo $form->error($model,'dateCreated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->