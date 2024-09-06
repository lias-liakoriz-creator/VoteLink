<?php
// Include the database connection file
include_once '../config.php';

/**
 * Sanitize input data to prevent SQL injection and XSS attacks.
 *
 * @param string $data
 * @return string
 */
function sanitizeInput($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = $conn->real_escape_string($data);
    return $data;
}

/**
 * Check if a NIRA ID is valid and eligible to vote.
 *
 * @param string $nira_id
 * @return array|false
 */
function checkNiraEligibility($nira_id) {
    global $conn;
    $query = "SELECT * FROM nira_data WHERE nira_id = ? AND is_eligible = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $nira_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc(); // Return NIRA data
    } else {
        return false;
    }
}

/**
 * Register a voter using their NIRA ID and preferred language.
 *
 * @param string $nira_id
 * @param string $language
 * @return bool
 */
function registerVoter($nira_id, $language) {
    global $conn;
    $nira_data = checkNiraEligibility($nira_id);

    if ($nira_data) {
        $query = "INSERT INTO voters (nira_id, full_name, date_of_birth, gender, language)
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss", $nira_data['nira_id'], $nira_data['full_name'], 
                          $nira_data['date_of_birth'], $nira_data['gender'], $language);

        return $stmt->execute(); // Returns true on success, false on failure
    } else {
        return false; // NIRA ID not eligible
    }
}

/**
 * Authenticate a voter using their NIRA ID.
 *
 * @param string $nira_id
 * @return bool
 */
function authenticateVoter($nira_id) {
    global $conn;
    $query = "SELECT * FROM voters WHERE nira_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $nira_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return true; // Authentication successful
    } else {
        return false; // Authentication failed
    }
}

/**
 * Get all candidates for the election.
 *
 * @return array
 */
function getCandidates() {
    global $conn;
    $query = "SELECT * FROM candidates";
    $result = $conn->query($query);

    $candidates = [];
    while ($row = $result->fetch_assoc()) {
        $candidates[] = $row;
    }

    return $candidates;
}

/**
 * Cast a vote for a candidate.
 *
 * @param int $voter_id
 * @param string $candidate
 * @return bool
 */
function castVote($voter_id, $candidate) {
    global $conn;
    $query = "INSERT INTO votes (voter_id, candidate) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $voter_id, $candidate);

    return $stmt->execute(); // Returns true on success, false on failure
}

/**
 * Check if a voter has already voted.
 *
 * @param int $voter_id
 * @return bool
 */
function hasVoted($voter_id) {
    global $conn;
    $query = "SELECT * FROM votes WHERE voter_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $voter_id);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows > 0; // Returns true if voter has voted, false otherwise
}

/**
 * Get voting results (e.g., count votes for each candidate).
 *
 * @return array
 */
function getVotingResults() {
    global $conn;
    $query = "SELECT candidate, COUNT(*) as vote_count FROM votes GROUP BY candidate";
    $result = $conn->query($query);

    $results = [];
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    return $results;
}

/**
 * Check if the current user is an admin.
 *
 * @param string $username
 * @param string $password
 * @return bool
 */
function isAdmin($username, $password) {
    global $conn;
    $query = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        return password_verify($password, $admin['password']); // Verify password
    } else {
        return false;
    }
}

/**
 * Redirect to a different page.
 *
 * @param string $url
 */
function redirect($url) {
    header("Location: $url");
    exit;
}
?>
