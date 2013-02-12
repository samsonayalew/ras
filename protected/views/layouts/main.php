<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!-- blueprint CSS framework -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/werefaicon.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container" id="page">
<div id="main">
<?php 
	$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Cinema', 'url'=>array('/site/cinemas')),
				array('label'=>'About', 'url'=>array('/site/about')),
				array('label'=>'Contact Us', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'))
					),
			));
?>
</div>
<br/><br/><br/>
	<div id="header">
		<div id="logo">
	</div><!-- header -->

	<?php echo $content; ?>
	<!-- <div id="footer">
	<?php 
	/*
	 	$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
					),
			));
	*/
	?>
	</div>
 -->
</div>
<!-- page -->
</div>
</body>
</html>