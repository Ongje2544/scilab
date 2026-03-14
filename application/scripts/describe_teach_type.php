<?php
$mysqli = new mysqli('localhost', 'root', '', 'scilab_db');
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}
$res = $mysqli->query('DESCRIBE teach_type');
if (!$res) {
    die('Error: ' . $mysqli->error);
}
while ($row = $res->fetch_assoc()) {
    echo $row['Field'] . ' ' . $row['Type'] . "\n";
}
$mysqli->close();
