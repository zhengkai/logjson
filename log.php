<?php
if ($_POST || !$_POST['info'] || !is_string($_POST['info'])) {
	// exit;
}

file_put_contents(
	__DIR__ . '/log/' . date('m-d-H') . '.txt',
	'post ' . json_encode($_POST) . "\n",
	LOCK_EX | FILE_APPEND
);

file_put_contents(
	__DIR__ . '/log/' . date('m-d-H') . '.txt',
	'json ' . file_get_contents("php://input") . "\n",
	LOCK_EX | FILE_APPEND
);
