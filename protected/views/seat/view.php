<?php
$this->breadcrumbs=array(
	'Seats'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Seat', 'url'=>array('index')),
	array('label'=>'Create Seat', 'url'=>array('create')),
	array('label'=>'Update Seat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Seat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Seat', 'url'=>array('admin')),
);
?>

<h1>View Seat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rSchedule',
		'no',
		'seatCondition',
		'dateCreted',
	),
)); ?>
