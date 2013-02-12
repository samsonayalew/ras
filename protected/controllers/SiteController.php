<?php
//import classes
Yii::import('application.vendors.*');
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata_YouTube');
Zend_Loader::loadClass('Zend_Gdata_YouTube_Extension_MediaGroup');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_YouTube_MediaEntry');
Zend_Loader::loadClass('Zend_Gdata_YouTube_PlaylistListEntry');
Zend_Loader::loadClass('Zend_Gdata_YouTube_PlaylistVideoEntry');
Zend_Loader::loadClass('Zend_Gdata_Media_Extension_MediaThumbnail');
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='//layouts/column2';
	
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionNew()
	{
		$criteria = new CDbCriteria();
		$count=Cinema::model()->count($criteria);
		$pages=new CPagination($count);
		
		// results per page
		$pages->pageSize=5;
		$pages->applyLimit($criteria);
		$models = Cinema::model()->findAll($criteria);
		
		$this->render('new', array(
				'models' => $models,
				'pages' => $pages
		));
	}
	public function actionIndex()
	{
		$file='http://gdata.youtube.com/feeds/api/users/ethiocinemas/uploads';
		$yt = new Zend_Gdata_YouTube();
		$yt->setMajorProtocolVersion(2);
		$ytQuery=$yt->newVideoQuery($file);
		$feed=$yt->getPlaylistVideoFeed($ytQuery);
		$criteria=new CDbCriteria();
		//$count=Movie::model()->count($criteria);
		$count=$feed->count();
		$pages=new CPagination($count);
		// results per page
		$pages->setPageSize(3);
		$pages->applyLimit($criteria);
		$this->render('index',array('feed'=> $feed,'pages'=>$pages,));
	}
	public function actionCinema()
	{
		$cinemas= Cinema::model()->findAll();
		//render the view file 'protected/views/site/cinema.php
		$this->render('cinema', array('cinemas'=>$cinemas));
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
	
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new Contact;
		if(isset($_POST['Contact']))
		{
			$model->attributes=$_POST['Contact'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
	
	public  function actionCheck()
	{
		$this->render('check');
	}
	
	public function actionAbout()
	{
		$this->render('about');
	}
	
	public function actionRegister()
	{
		$model=new User;
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->validate())
			{
				$model->save();
				$this->redirect('index');
			}
			else
			{
				print_r($model->errors);
			}
		}
		$this->render('register', array('model'=>$model));
	}
	
	public function rules()
	{
		return array(
				array('username, password', 'required'),
				array('password2', 'required', 'on'=>'register'),
				array('password', 'compare', 'on'=>'register'),
		);
	}
	
	public function actionCinemas()
	{
		$cinemas= Cinema::model()->findAll();
		//render the view file 'protected/views/site/cinema.php
		$this->render('cinemas', array('cinemas'=>$cinemas));
	}
	
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
				$this->redirect(Yii::app()->user->returnUrl);
				$this->render('Index');
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}