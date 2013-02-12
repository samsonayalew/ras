<?php

class ClarkModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'clark.models.*',
			'clark.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			if(!Yii::app()->authManager->checkAccess("admin",Yii::app()->user->id))
			{
				throw new CHttpException(403,Yii::t('yii','you are not autorized to perform this action.'));
			}
			else
			{
				return true;
			}
		}
		else
			return false;
	}
}
