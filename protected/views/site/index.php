<h3><i>Movie Catalog</i></h3>

<?php
$assetUrl=Yii::app()->request->baseUrl;
$i=0;
//foreach movies in the database
foreach ($feed as $enter) {
?> 

<li style='background:transparent;list-style: none;'>
<div>
<div class='video-content'>
<a width='138' height='120' href='#'>
<!-- php code -->
<?php
//image of the movie
echo CHtml::image($enter->mediaGroup->thumbnail[2]->url,
$enter->mediaGroup->thumbnail[2]->url, array(
'onclick'=>'$("#mydialog'.$i.'").dialog("open");
return false;',
'class'=>'a-image',
'alt'=>"Thumbnail",
'width'=>"138",
'height'=>"120",
'data-group-key'=>"thumb-group-2"));
?>

<div  class='div-PlayImage'>
<!-- php code -->
<?php
echo CHtml::image($assetUrl.'/images/play.gif', $assetUrl.'/images/play.gif', array(
		'onclick'=>'$("#mydialog'.$i.'").dialog("open");
		return false;',
		'alt'=>"Thumbnail",
		'data-thumb'=>$assetUrl.'/images/play.gif',
		'data-group-key'=>"thumb-group-2"));
?>

</div>
</a>
<div class='description'>
    
<?php
//link to the cinema where it is shown
echo CHtml::link($enter->title,
array('cinema',
'movie'=>$enter->title),
array('class'=>'',
'dir'=>'ltr','title',
'onclick'=> 'var jvar='.$enter->title,));
?>

</br>

<?php
echo CHtml::label('Description:- '.$enter->content,"#",
array(
'class'=>'result-item-translation-title',
'dir'=>'','title'));
?>

</div></div></div></li></br>

<?php
//the dialog for the video widget
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
'id'=>'mydialog'.$i,
//additional javascript options for the dialog plugin
'options'=>array(
'title'=>$enter->title,
'closeOnEscape'=> true,
'dialogClass'=>'dialog',
'id'=>'dialogTrans',
'show'=>'blind',
'autoOpen'=>false,
'modal'=>true,
'width'=>'670',
'height'=>'400',
'resizable'=>false,	
'close'=>'js:function(){ stopVideo(); }')));
?>

<div id='player<?php echo $i;?>'></div>

<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
$i++;
}
//this is the javascript for javascript API for the video that i will play
?>

<!-- the start of javascript -->
<script type='text/javascript'>
function stop(){
	alert('this');
}
//2. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');
tag.src = "//www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
// 3. This function creates an <iframe> (and YouTube player)
// after the API code downloads.
<?php 
$playerInt=0;
foreach ($feed as $enter) {
	echo "var player".$playerInt.";\n";
	$playerInt++;
}
?>
function onYouTubeIframeAPIReady() {
<?php 
$eventInt=0;
foreach($feed as $enter)
{
echo "player".$eventInt."= new YT.Player('player".$eventInt."', {
	height: '360',
    width: '640',
    videoId: '".$enter->getVideoId()."',
events: {
'onReady': onPlayerReady,
'onStateChange': onPlayerStateChange
}
});";
$eventInt++;
}
?>
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
//event.target.playVideo();
}

// 5. The API calls this function when the player's state changes.
// The function indicates that when playing a video (state=1),
// the player should play for six seconds and then stop.
var done = false;
function onPlayerStateChange(event) {
if (event.data == YT.PlayerState.PLAYING && !done) {
setTimeout(stopVideo, 6000);
done = true;
}
}
function stopVideo() {
<?php 
$playInt=0;
foreach($feed as $enter)
{
echo 'player'.$playInt.'.stopVideo();';
$playInt++;
}
//$this->widget('CLinkPager', array(
//		'pages' => $pages,
//))
?>
}
</script>