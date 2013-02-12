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
	$whereAbout;
	$when;
	$title;
	//this compose the title of the movie when it will be seen
	$stringComposition='';
	foreach ($eventFeed as $event){
				preg_match("/where.+/i",$event->content->text, $matches);
				$whereAbout[$matches[0]][] = $event->content->text;
				$title[$matches[0]][]=$event->title->text;
	}
	$cinemaNames=array_keys($whereAbout);
	foreach ($cinemaNames as $key){
		$valuePair='';
		$countDetail=0;
		foreach($whereAbout[$key] as $value){
			preg_match("/when.+/i", $value, $whenMatches);
			foreach($whenMatches as $match)
			$when[$key][] = $match;
			$stringComposition .= $title[$key][$countDetail].'<br/>';
			$stringComposition .= substr($when[$key][$countDetail], 6).'<br/>';
			$countDetail++;
		}
		$this->widget('zii.widgets.jui.CJuiAccordion', array(
				'panels'=>array(substr($cinemaNames[$i], 7)=>$stringComposition,
				),
				// additional javascript options for the accordion plugin
				'options'=>array(
						'animated'=>'accordion',
						'collapsible' => true
				),
		));
		echo "</br>";
		$i++;
		$stringComposition='';
	}
?>