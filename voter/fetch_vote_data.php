<?php
session_start();
include '../config.php';

// Fetch statistics with error checking
$positions_query = "SELECT COUNT(*) AS count FROM positions";
$result = $conn->query($positions_query);

if (!$result) {
    die("Query failed: " . $conn->error);  // This will show you the error if the query fails
}

$positions_count = $result->fetch_assoc()['count'];

// Repeat this process for other queries
$candidates_query = "SELECT COUNT(*) AS count FROM candidates";
$candidates_result = $conn->query($candidates_query);

if (!$candidates_result) {
    die("Query failed: " . $conn->error);
}

$candidates_count = $candidates_result->fetch_assoc()['count'];

$votes_query = "SELECT COUNT(*) AS count FROM votes";
$votes_result = $conn->query($votes_query);

if (!$votes_result) {
    die("Query failed: " . $conn->error);
}

$votes_count = $votes_result->fetch_assoc()['count'];
?>
