<?php
if (!$_POST || empty($_POST['v']) || !is_string($_POST['v'])) {
	exit;
}

$s =& $_POST['type'];
if (!is_string($s) || !preg_match('#^[A-Za-z0-9]{1,10}$#', $s)) {
	exit;
}

define('NOW', $_SERVER['REQUEST_TIME']);

$filename = $s . date('-Ymd', NOW) . '.txt';

file_put_contents(
	__DIR__ . '/log/' . $filename,
	date('Y-m-d H:i:s', NOW) . "\n" . $_POST['v'] . "\n\n",
	LOCK_EX | FILE_APPEND
);

/*
file_put_contents(
	__DIR__ . '/log/' . $filename,
	'json ' . file_get_contents("php://input") . "\n",
	LOCK_EX | FILE_APPEND
);
 */
