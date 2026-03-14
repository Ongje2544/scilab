<?php
$mysqli = new mysqli('localhost','root','','scilab_db');
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}
$res = $mysqli->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='scilab_db' AND TABLE_NAME='process' AND COLUMN_NAME='Teach_process'");
if (!$res) {
    die('Error: ' . $mysqli->error);
}
echo $res->num_rows ? 'Teach_process exists\n' : 'Teach_process missing\n';
$mysqli->close();
