﻿<?php



class RbacCommand extends CConsoleCommand

{

    public function run($args)

    {

      $auth=Yii::app()->authManager;

$auth->createOperation('createPost','create a post');

		$auth->createOperation('readPost','read a post');

		$auth->createOperation('updatePost','update a post');

		$auth->createOperation('deletePost','delete a post');



		$bizRule='return Yii::app()->user->id==$params["post"]->authID;';

		$task=$auth->createTask('updateOwnPost','update a post by author himself',$bizRule);

		$task->addChild('updatePost');



		$role=$auth->createRole('reader');

		$role->addChild('readPost');



		$role=$auth->createRole('author');

		$role->addChild('reader');

		$role->addChild('createPost');

		$role->addChild('updateOwnPost');



		$role=$auth->createRole('editor');

		$role->addChild('reader');

		$role->addChild('updatePost');



		$role=$auth->createRole('admin');

		$role->addChild('editor');

		$role->addChild('author');

		$role->addChild('deletePost');



		$auth->assign('admin','demo');



		$auth->save(); 

	}

}





?>