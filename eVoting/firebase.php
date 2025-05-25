<?php
require_once __DIR__ . '/vendor/autoload.php';
use Kreait\Firebase\Factory;

// Initialize Firebase with the service account and database URI
$firebase = (new Factory)
    ->withServiceAccount(__DIR__ . '/evoting-86a8c-firebase-adminsdk-8oqwd-a369e65075.json') // Path to your service account file
    ->withDatabaseUri('https://evoting-86a8c-default-rtdb.europe-west1.firebasedatabase.app'); // Correct Firebase Database URL

// Get the Firebase Realtime Database instance
$database = $firebase->createDatabase(); // Use createDatabase() instead of getDatabase()

// Check if the database instance was created successfully
if ($database) {
    echo "Database connected successfully.\n";

    // Example: Write data to the database
    $newPost = $database
        ->getReference('posts')
        ->push([
            'title' => 'Election Candidate 1',
            'votes' => 0
        ]);
    
    // Example: Read data from the database
    $posts = $database->getReference('posts')->getValue();
    print_r($posts);
} else {
    echo "Failed to connect to Firebase Database.\n";
}
