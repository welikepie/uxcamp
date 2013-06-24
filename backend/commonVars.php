<?php
$GLOBALS = array(
		'questions' => array("City"), //which user suggested questions to fetch. Is case sensitive.
		'company' => true, //whether to retrieve company or not. This is a method that can be copied for other bits on the company level.
		'fileName' => 'JSON.json', //filename to write json to.
		'app_key' => "FZ2UAUQJY7JF36AL27", //individual app key
		'user_key' => "129944955112066955589", //user key for accessing private info.
		//'event_id' => "5200871948", //event id. For future reference this is february's Geeky.
		'event_id' => "7067500083", //For future reference, this is not february's Geeky, but UXcamp.
		'expireTime' => 120, // time to expire in seconds. 120 as default.
		'resultsArr' => array()
	);
?>