<?php
$mysqli = new mysqli('localhost', 'root', '', 'scilab_db');
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}
$needed = [
    'Class_process' => "text NULL",
    'CreateDate' => "datetime NULL",
    'UpdateDate' => "datetime NULL",
    'Place_address' => "text NULL",
    'StartDate' => "datetime NULL",
    'EndDate' => "datetime NULL",
    'Lab_process' => "text NULL",
    'numCount' => "int(11) NULL",
    'Teach_process' => "text NULL",
];
foreach ($needed as $col => $definition) {
    $res = $mysqli->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='scilab_db' AND TABLE_NAME='process' AND COLUMN_NAME='$col'");
    if (!$res) {
        echo "Error checking $col: " . $mysqli->error . "\n";
        continue;
    }
    if ($res->num_rows === 0) {
        $sql = "ALTER TABLE process ADD COLUMN `$col` $definition";
        if ($mysqli->query($sql)) {
            echo "Added column $col ($definition)\n";
        } else {
            echo "Error adding $col: " . $mysqli->error . "\n";
        }
    } else {
        echo "Column $col already exists\n";
    }
}
$mysqli->close();
