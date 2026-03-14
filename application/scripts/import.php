<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scilab_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create process table if not exists
$create_process = "CREATE TABLE IF NOT EXISTS `process` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SchoolID_process` int(11) DEFAULT NULL,
  `name_list` varchar(255) DEFAULT NULL,
  `concept_list` text DEFAULT NULL,
  `teach_list` varchar(50) DEFAULT NULL,
  `price_list` varchar(255) DEFAULT NULL,
  `Status` enum('Waiting','Process','Online') DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

if ($conn->query($create_process) === TRUE) {
    echo "Process table created successfully\n";
} else {
    echo "Error creating process table: " . $conn->error . "\n";
}

// Create class_type_list table if not exists (used for class selections per queue)
$create_class_type_list = "CREATE TABLE IF NOT EXISTS `class_type_list` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Class_id` varchar(10) NOT NULL,
  `Queue_id` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
if ($conn->query($create_class_type_list) === TRUE) {
    echo "class_type_list table created successfully\n";
} else {
    echo "Error creating class_type_list table: " . $conn->error . "\n";
}

// Create teach_process_list table if not exists (used for teacher selections per queue)
$create_teach_process_list = "CREATE TABLE IF NOT EXISTS `teach_process_list` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Teach_id` int(11) NOT NULL,
  `Process_id` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
if ($conn->query($create_teach_process_list) === TRUE) {
    echo "teach_process_list table created successfully\n";
} else {
    echo "Error creating teach_process_list table: " . $conn->error . "\n";
}

// Read SQL file
$sql = file_get_contents('c:\Users\gmodt\Downloads\test_db.sql');

// Execute SQL
if ($conn->multi_query($sql)) {
    echo "Database imported successfully\n";
} else {
    echo "Error importing database: " . $conn->error . "\n";
}

$conn->close();
?>