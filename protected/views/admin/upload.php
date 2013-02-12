<?php
$this->breadcrumbs=array(
	'Movies'=>array('index'),
	'Create',
);
?>
<h1>Create Movie</h1>

<?php echo $this->renderPartial('uploadForm', array('model'=>$model)); ?>
