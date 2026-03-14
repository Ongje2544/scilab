<?php
$mysqli = new mysqli('localhost', 'root', '', 'scilab_db');
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}
$res = $mysqli->query('DESCRIBE process');
if (!$res) {
    die('Error: ' . $mysqli->error);
}
while ($row = $res->fetch_assoc()) {
    echo $row['Field'] . ' ' . $row['Type'] . ' NULL=' . $row['Null'] . ' Key=' . $row['Key'] . ' Default=' . $row['Default'] . '\n';
}
$mysqli->close();
