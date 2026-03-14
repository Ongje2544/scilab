<?php
$mysqli = new mysqli('localhost','root','','scilab_db');
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}
$res = $mysqli->query('SELECT * FROM process ORDER BY ID DESC LIMIT 5');
while ($row = $res->fetch_assoc()) {
    echo json_encode($row, JSON_UNESCAPED_UNICODE) . "\n";
}
$mysqli->close();
