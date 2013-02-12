<?php 
//echo 'this is calenderEdit';
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schedule-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($schedule); ?>

	<div class="row">
		<?php echo $form->labelEx($schedule,'movie Title'); ?>
		<?php echo $form->dropDownList($schedule,'rMovie',CHtml::listData(
				Movie::model()->findAll(), 'id', 'name'), array('prompt' => 'Select the Movie')); ?>
		<?php echo $form->error($schedule,'rMovie'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($schedule,'cinema Name'); ?>
		<?php echo $form->dropDownList($schedule,'rCinema',CHtml::listData(
				Cinema::model()->findAll(), 'id', 'name'), array('prompt' => 'Select the Cinema')); ?>
		<?php echo $form->error($schedule,'rCinema'); ?>
	</div>
	
	<div class="row">
	<label> Show Date </label>
	<?php
	$this->widget('zii.widgets.jui.CJuiDatePicker',
			array(
					'model'=>$schedule,
					'attribute'=>'dayOfTheWeek',
					'language'=>'en',
					'value'=>'Y-m-d',
					'options'=>array('dateFormat'=>'yy-m-d'),
					'htmlOptions'=>array('size'=>20,'class'=>'time')
	));
	?>
	<?php echo $form->error($schedule,'dayOfTheWeek');
	echo " Note: year-month-day";
	?>
	</div>
	
	<div class="row">
	<?php 
	$this->widget('zii.widgets.timepicker.timepicker', array(
			'model'=>$schedule,
			'name'=>'startTime',
			'select'=>'time',
	));
	
	?>
	<?php $form->error($schedule, 'startTime'); ?>
	<?php
	echo ' to ';
	$this->widget('zii.widgets.timepicker.timepicker', array(
			'model'=>$schedule,
			'name'=>'endTime',
			'select'=>'time'
	));
	?>
	<?php echo $form->error($schedule, 'endTime'); ?>
	<?php //echo $form->labelEx($schedule,'dateCreated',array('hidden'=>true)); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($schedule->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->