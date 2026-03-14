<?php
include 'application/config/database.php';
include 'application/config/autoload.php';

$db = new mysqli($db['default']['hostname'], $db['default']['username'], $db['default']['password'], $db['default']['database']);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$query = "SELECT Lab_id, Teach_id FROM teach_type_list";
$result = $db->query($query);

$labToTeachers = [];
while ($row = $result->fetch_assoc()) {
    $labToTeachers[$row['Lab_id']][] = $row['Teach_id'];
}

foreach ($labToTeachers as &$arr) {
    $arr = array_values(array_unique($arr));
}
unset($arr);

echo "labToTeachers mapping:\n";
print_r($labToTeachers);

$db->close();
?>