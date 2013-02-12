<?php
//import classes
Yii::import('application.vendors.*');
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata_YouTube');
Zend_Loader::loadClass('Zend_Gdata_YouTube_Extension_MediaGroup');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_AuthSub');
Zend_Loader::loadClass('Zend_Gdata_YouTube_MediaEntry');
Zend_Loader::loadClass('Zend_Gdata_Media_Extension_MediaThumbnail');
Zend_Loader::loadClass('Zend_Gdata_Calendar');
Zend_Loader::loadClass('Zend_Gdata_Calendar_EventEntry');
class AdminController extends Controller 
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='//layouts/column2';
	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	
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
	
	
	public function actionView($id)
	{
		$this->render('view',array(
				'model'=>$this->loadModel($id),
		));
	}
	public  $file;
	public function actionUpload()
	{
		$model=new Movie;
			
		if(isset($_POST['Movie']))
		{
			$model->attributes=$_POST['Movie'];
			if($model->save())
			{
				$this->redirect(array('uploadFile','id'=>$model->id));
			}
		}

		$this->render('upload',array(
			'model'=>$model,
		));

	}
	public function actionUploadFile($id){
		$model=Movie::model()->findAllByPk($id);
		$this->render('uploadFile',array(
				'model'=>$model
		));
	}
	public function actionCalendar(){
		
		$schedule= new Schedule;
		if(isset($_POST['Schedule']))
		{
			
			$schedule->attributes=$_POST['Schedule'];
			if($schedule->save())
			{
			$this->redirect(array('calendarView','id'=>$schedule->id,'movie'=>$schedule->rMovie,'cinema'=>$schedule->rCinema));
			}
		}
		
		$this->render('calendar', array('schedule'=>$schedule));
	}
	public $starttime;
	public function actionCalendarView($id, $movie, $cinema)
	{
		$schedule=Schedule::model()->findAllByPk($id);
		$movies=Movie::model()->findAllByPk($movie);
		$cinemas=Cinema::model()->findAllByPk($cinema);
		
		$user = 'samson.ayalew.et@gmail.com';
		$pass = 'sam$5000';
		$service = Zend_Gdata_Calendar::AUTH_SERVICE_NAME; // predefined service name for calendar
			
		$client = Zend_Gdata_ClientLogin::getHttpClient($user,$pass,$service);
			
		$developerKey = 'AI39si4FgoNj_Dkfh-2z_bG82COnQtRuNeDH10O21UpWMmQo9FPiuWzopyz9l0I-c0Fz8wVlf9bGhR006nlu29FNPlPrKxbi7A';
		$applicationId = '';
		$clientId = '';
		$gdataCal = new Zend_Gdata_Calendar($client, $applicationId, $clientId, $developerKey);
		$newEvent = $gdataCal->newEventEntry();
			
		$newEvent->title = $gdataCal->newTitle($movies[sizeof($movies)-1]['name']);
		$newEvent->where = array($gdataCal->newWhere($cinemas[sizeof($cinemas)-1]['name']));
		$newEvent->content = $gdataCal->newContent($movies[sizeof($movies)-1]['description']);
			
		$when = $gdataCal->newWhen();
		$dateFormat=date('m/d/Y', strtotime($schedule[sizeof($schedule)-1]['dayOfTheWeek']));
		$when->startTime ="{$schedule[sizeof($schedule)-1]['dayOfTheWeek']}T{$schedule[sizeof($schedule)-1]['startTime']}";
		$when->endTime ="{$schedule[sizeof($schedule)-1]['dayOfTheWeek']}T{$schedule[sizeof($schedule)-1]['endTime']}";
		$newEvent->when = array($when);
			
		// Upload the event to the calendar server
		// A copy of the event as it is recorded on the server is returned
		$createdEvent = $gdataCal->insertEvent($newEvent);
		
		$this->render('calendarView',array(
				'schedule'=>$schedule,
		));
		return $createdEvent->id->text;
	}
	
	public function actionVideo(){
		$dataProvider=new CActiveDataProvider('movie');
		$this->render('video',array(
				'dataProvider'=>$dataProvider,
		));
	}
	
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
	
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function accessRules()
	{
		return array(
				// allow superadmin to edit/delete all products
				array('allow',
						'actions' => array('upload','calendar'),
						'roles' => array('dataadmin')
				),
				
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
}