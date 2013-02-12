<?php
$this->breadcrumbs=array(
	'Cinemas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Cinema', 'url'=>array('index')),
	array('label'=>'Create Cinema', 'url'=>array('create')),
	array('label'=>'Update Cinema', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cinema', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cinema', 'url'=>array('admin')),
);
?>

<h1>View Cinema #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'city',
		'address',
		'dateCreated',
	),
)); ?>
