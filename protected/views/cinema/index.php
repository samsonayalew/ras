<?php
$this->breadcrumbs=array(
	'Cinemas',
);

$this->menu=array(
	array('label'=>'Create Cinema', 'url'=>array('create')),
	array('label'=>'Manage Cinema', 'url'=>array('admin')),
);
?>

<h1>Cinemas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
