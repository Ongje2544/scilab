<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$mysqli = new mysqli('localhost','root','','scilab_db');
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}
echo "start\n";
$tables = ['class_type_list', 'teach_process_list'];
foreach ($tables as $table) {
    echo "checking $table\n";
    $res = $mysqli->query("SHOW TABLES LIKE '$table'");
    if ($res === false) {
        echo "Error checking $table: " . $mysqli->error . "\n";
        continue;
    }
    echo "$table: " . ($res->num_rows ? 'exists' : 'missing') . "\n";
}
echo "done\n";
$mysqli->close();
