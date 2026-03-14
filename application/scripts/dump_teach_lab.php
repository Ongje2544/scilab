<?php
$mysqli = new mysqli('localhost','root','','scilab_db');
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}
$res = $mysqli->query('SELECT Teach_id, Lab_id FROM teach_type_list LIMIT 10');
while ($row = $res->fetch_assoc()) {
    echo json_encode($row, JSON_UNESCAPED_UNICODE) . "\n";
}
$mysqli->close();
