<?php 

$title=$model[sizeof($model)-1]['name'];
$description=$model[sizeof($model)-1]['description'];
$genre=$model[sizeof($model)-1]['genre'];

echo CHtml::label('name', 'name');
echo ':'.$title."<br/>";
echo CHtml::label('description','description');
echo ':'.$description."<br/>";

session_start();

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

// create a new VideoEntry object
$myVideoEntry = new Zend_Gdata_YouTube_VideoEntry();

$myVideoEntry->setVideoTitle($title);
$myVideoEntry->setVideoDescription($description);
// The category must be a valid YouTube category!
$myVideoEntry->setVideoCategory('Entertainment');

// Set keywords. Please note that this must be a comma-separated string
// and that individual keywords cannot contain whitespace
$myVideoEntry->SetVideoTags($genre);

$tokenHandlerUrl = 'http://gdata.youtube.com/action/GetUploadToken';
$tokenArray = $yt->getFormUploadToken($myVideoEntry, $tokenHandlerUrl);
$tokenValue = $tokenArray['token'];
$postUrl = $tokenArray['url'];

// place to redirect user after upload

$nextUrl = 'http://localhost:8080'.$_SERVER['REQUEST_URI'];

// build the form
print '<form action="'. $postUrl .'?nexturl='. $nextUrl .
'" method="post" enctype="multipart/form-data">'.
'<input name="file" type="file"/>'.
'<input name="token" type="hidden" value="'. $tokenValue .'"/>'.
'<input value="Upload Video File" type="submit" />'.
'</form>';
?>
