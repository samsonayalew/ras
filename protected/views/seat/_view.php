<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rSchedule')); ?>:</b>
	<?php echo CHtml::encode($data->rSchedule); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no')); ?>:</b>
	<?php echo CHtml::encode($data->no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seatCondition')); ?>:</b>
	<?php echo CHtml::encode($data->seatCondition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateCreted')); ?>:</b>
	<?php echo CHtml::encode($data->dateCreted); ?>
	<br />


</div>