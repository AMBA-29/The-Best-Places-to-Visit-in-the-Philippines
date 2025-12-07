<?php
session_start();

$counter_file = 'visitor_count.txt';
$initial_count = 9991; // Set your initial count here

// Check if the counter file exists, if not, create it with the initial count.
if (!file_exists($counter_file)) {
    file_put_contents($counter_file, $initial_count);
}

// Read the current count from the file.
$count = (int)file_get_contents($counter_file);

// Check if the 'visited' session variable is set.
// A new session is started for each new browser or after the old one expires.
if (!isset($_SESSION['visited'])) {
    // If not set, this is a new session/visitor.
    $count++;
    
    // Write the new count back to the file.
    file_put_contents($counter_file, $count);
    
    // Set the session variable to mark this session as visited.
    $_SESSION['visited'] = true;
}

// Return the current count as plain text.
echo $count;
?>