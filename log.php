<?php
if ($_POST || !$_POST['info'] || !is_string($_POST['info'])) {
	exit;
}

file_put_contents(
	__DIR__ . '/log/' . date('m-d-H') . '.txt',
	$_POST['info'],
	LOCK_EX | FILE_APPEND
);
