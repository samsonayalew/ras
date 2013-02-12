<?php
$this->breadcrumbs=array(
	'Cinemas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cinema', 'url'=>array('index')),
	array('label'=>'Create Cinema', 'url'=>array('create')),
	array('label'=>'View Cinema', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cinema', 'url'=>array('admin')),
);
?>

<h1>Update Cinema <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>