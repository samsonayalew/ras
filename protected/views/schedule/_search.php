<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rMovie'); ?>
		<?php echo $form->textField($model,'rMovie'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rCinema'); ?>
		<?php echo $form->textField($model,'rCinema'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dayOfTheWeek'); ?>
		<?php echo $form->textField($model,'dayOfTheWeek'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'startTime'); ?>
		<?php echo $form->textField($model,'startTime',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'endTime'); ?>
		<?php echo $form->textField($model,'endTime',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateCreated'); ?>
		<?php echo $form->textField($model,'dateCreated'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->