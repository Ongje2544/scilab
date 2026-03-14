<?php
$mysqli = new mysqli('localhost', 'root', '', 'scilab_db');
if ($mysqli->connect_error) {
    die('Connect Error: ' . $mysqli->connect_error);
}
$res = $mysqli->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='scilab_db' AND TABLE_NAME='teach_type' AND COLUMN_NAME='FileName'");
if ($res && $res->num_rows > 0) {
    echo "Column FileName already exists.\n";
} else {
    $sql = "ALTER TABLE teach_type ADD COLUMN FileName varchar(255) NULL";
    $ok = $mysqli->query($sql);
    if ($ok) {
        echo "Added FileName column to teach_type.\n";
    } else {
        echo "Error adding column: " . $mysqli->error . "\n";
    }
    echo "(SQL: $sql)\n";
}
$res2 = $mysqli->query('DESCRIBE teach_type');
while ($row = $res2->fetch_assoc()) {
    echo $row['Field'] . ' ' . $row['Type'] . "\n";
}
$mysqli->close();
