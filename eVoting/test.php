<?php
require 'firebase.php';

// Insert sample data into Firebase
$data = [
    'name' => 'Jane Doe',
    'email' => 'jane.doe@example.com',
    'voted' => false
];

$database->getReference('users')->push($data);
echo "Data inserted successfully!";
?>
