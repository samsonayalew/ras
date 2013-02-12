<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rMovie')); ?>:</b>
	<?php echo CHtml::encode($data->rMovie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rCinema')); ?>:</b>
	<?php echo CHtml::encode($data->rCinema); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dayOfTheWeek')); ?>:</b>
	<?php echo CHtml::encode($data->dayOfTheWeek); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('startTime')); ?>:</b>
	<?php echo CHtml::encode($data->startTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('endTime')); ?>:</b>
	<?php echo CHtml::encode($data->endTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateCreated')); ?>:</b>
	<?php echo CHtml::encode($data->dateCreated); ?>
	<br />


</div>