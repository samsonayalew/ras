<?php
Yii::import('application.vendors.*');
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata_Calendar');
Zend_Loader::loadClass('Zend_Gdata_Calendar_EventQuery');
Zend_Loader::loadClass('Zend_Gdata_App_Extension_Name');
$feed="https://www.google.com/calendar/feeds/samson.ayalew.et%40gmail.com/public/basic";
$service=new Zend_Gdata_Calendar();
$eventFeed=$service->getCalendarEventFeed($feed);
$i=0;

foreach ($eventFeed as $event)
{
	if($i<8)
    if($event->title->text===$_GET['movie'])
	{
	if($i==0)
		echo "<br/><br/><span style='font-weight: bold;'>  ".$event->title->text."</span><br/><br/>";
	preg_match("/when.+/i", $event->summary->text, $whenMatches);
	preg_match("/where.+/i",$event->content->text, $whereMatches);
	$this->widget('zii.widgets.jui.CJuiAccordion', array(
    'panels'=>array(
        $cinemas[$i]->name=>substr($whenMatches[0],6)."</br>"
    ),
    // additional javascript options for the accordion plugin
    'options'=>array(
				'animated'=>'accordion',
				'collapsible' => true
    ),
));
	}
	echo "</br>";
$i++;
}
?>