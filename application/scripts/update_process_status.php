<?php
$mysqli = new mysqli('localhost','root','','scilab_db');
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}
$mysqli->query("UPDATE process SET Status='Waiting' WHERE Status IS NULL");
echo "updated rows: " . $mysqli->affected_rows . "\n";
$mysqli->close();
