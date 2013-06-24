<?php
error_reporting(-1);
require_once("commonVars.php");
$fileName = $GLOBALS["fileName"]; //set in retrieve as well.
$expireTime = $GLOBALS["expireTime"];

	$stats = (file_exists($fileName) ? stat($fileName) : array('mtime' => 0));
	if (($stats['mtime'] + $expireTime) < time()) {
		touch($fileName);
		require_once('retrieve.php');
	}
	
	$result;

	try {
	$result = file_get_contents($fileName);


		$result = json_encode($result);
		header('HTTP/1.1 200 OK', 200, true);
	
	} catch (Exception $e) {
	print($e->getMessage());

		$result['error'] = $e->getMessage();
		$result = json_encode($result);
		header('HTTP/1.1 502 Bad Gateway', 502, true);
	
	}
	
	if (isset($_GET['callback'])) {
		$result = "{$_GET['callback']}($result);";
		header('Content-Type: application/javascript; charset=utf-8');
	} else {
		header('Content-Type: application/json; charset=utf-8');
	}

	header('Content-Length: ' . strlen($result));
	header('Connection: close');
	
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
	
	echo($result); 
	unset($result);
	@ob_end_flush(); @flush();
	
	
	
?>