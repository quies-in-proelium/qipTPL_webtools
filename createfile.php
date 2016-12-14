<?php
header('Content-disposition: attachment; filename=briefing.sqf');
header('Content-type: text/plain');
echo $_POST['briefing'];
exit();
?>
