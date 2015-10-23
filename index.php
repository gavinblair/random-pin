<?php

	function load_xml_feed($feed)
	{
		global $RanVal;
		$i= 1;
		$FeedXml = simplexml_load_file($feed);
		foreach ($FeedXml->channel->item as $topic) {
			$title[$i] = (string)$topic->title;
			$link[$i] = (string)$topic->link;
			$description[$i] = (string)$topic->description;
			$i++;
		}
		$randtopic = rand(2, $i);
		$link = trim($link[$randtopic]);
		$title = trim($title[$randtopic]);
		$description = trim($description[$randtopic]);
		$RanVal = array($title,$link,$description);
		return $RanVal;
	}
    $username = $_GET['username'];
    $boardname = $_GET['board'];
	$pinsfeed = 'https://pinterest.com/'.$username.'/'.$boardname.'.rss';

	load_xml_feed($pinsfeed);
	$link = $RanVal[1];
	$title = $RanVal[0];
	$description = $RanVal[2];
	preg_match('/src="([^"]*)"/', $description, $matches);
	$src = $matches[1];
	//echo "<h1>".$title."</h1><h2>".$link."</h2><p>".$description."</p><img src='$src' />";
	echo "<img src='$src' class='switch' />";
?>
<style>
	img {
		width: 100vw;
	}
	img.switch {
		width: auto;
		height: 100vh;
	}
</style>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
jQuery('document').ready(function($){
	$('body').click(function(){
		$('img').toggleClass('switch');
	});
});
</script>

</script>