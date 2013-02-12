<?php
$this->breadcrumbs=array(
	'Cinemas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cinema', 'url'=>array('index')),
	array('label'=>'Manage Cinema', 'url'=>array('admin')),
);
?>

<h1>Create Cinema</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>