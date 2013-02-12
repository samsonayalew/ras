<?php
//6jgo0AL_CX8

$authenticationURL= 'https://www.google.com/accounts/ClientLogin';
$httpClient =
Zend_Gdata_ClientLogin::getHttpClient(
		$username = 'samson.ayalew.et@gmail.com',
		$password = 'sam$5000',
		$service = 'youtube',
		$client = null,
		$source = 'MySource', // a short string identifying your application
		$loginToken = null,
		$loginCaptcha = null,
		$authenticationURL);

$developerKey = 'AI39si4FgoNj_Dkfh-2z_bG82COnQtRuNeDH10O21UpWMmQo9FPiuWzopyz9l0I-c0Fz8wVlf9bGhR006nlu29FNPlPrKxbi7A';
$applicationId = '';
$clientId = '';


$yt = new Zend_Gdata_YouTube($httpClient, $applicationId, $clientId, $developerKey);
$yt->setMajorProtocolVersion(1);

