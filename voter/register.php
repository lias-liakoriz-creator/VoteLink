<?php
session_start();  // Start the session to access language preference

// Check if a language is set via session, otherwise default to English
$language = isset($_SESSION['language']) ? $_SESSION['language'] : 'English';

include '../config.php';
include '../includes/languages.php';  // Include the language file
include '../includes/header.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nira_id = $_POST['nira_id'];

    // Check if NIRA ID exists and is eligible
    $query = "SELECT * FROM nira_data WHERE nira_id = ? AND is_eligible = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $nira_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $nira_data = $result->fetch_assoc();

        // Insert into voters table
        $insert_query = "INSERT INTO voters (nira_id, full_name, date_of_birth, gender, language)
                         VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("sssss", $nira_data['nira_id'], $nira_data['full_name'], 
                          $nira_data['date_of_birth'], $nira_data['gender'], $language);
        
        if ($stmt->execute()) {
            $success = $texts[$language]['registration_success'];
        } else {
            $error = $texts[$language]['registration_fail'];
        }
    } else {
        $error = $texts[$language]['nira_not_found'];
    }
}
?>


<main>
    <div class="register-container">
        <h2><?php echo $texts[$language]['voter_registration']; ?></h2>
        <?php if ($error): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p class="success-message"><?php echo $success; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="nira_id"><?php echo $texts[$language]['nira_id']; ?>:</label>
            <input type="text" id="nira_id" name="nira_id" required>

            <button type="submit"><?php echo $texts[$language]['register']; ?></button>
        </form>
        <p class="login-link"><?php echo $texts[$language]['already_registered']; ?> <a href="login.php"><?php echo $texts[$language]['login_here']; ?></a></p>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
