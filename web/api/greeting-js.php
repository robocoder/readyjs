<?php
sleep(10);

header('Content-Type: text/javascript; charset=utf8');
header('Expires: Thu, 19 Nov 1981 08:52:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
header('Pragma: no-cache');
?>
document.getElementById('output').innerHTML = 'Hello world';
