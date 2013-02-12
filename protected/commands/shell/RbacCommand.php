<?php
$auth='Yii::app()->user->id==$param["post"]->authID';
//create a general task-level permission for admins
$bizRule='return Yii';
$this->_authManager->createTask("adminManagement", "access to the
application administration functionality", $auth);
//create the site admin role, and add the appropriate permissions
$role=$this->_authManager->createRole("dataadmin");
$role->addChild("upload");
$role->addChild("calender");
//$role->addChild("member");
//$role->addChild("adminManagement");

//ensure we have one admin in the system (force it to be user id #1)
//$role=$this->_authManager->$role->addChild("user");
//$role->addChild("");
//$role->addChild("user");
//$role->addChild("manager");
?>