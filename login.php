<?php
session_start();  // Start the session to access language preference

// Check if a language is set via session, otherwise default to English
$language = isset($_SESSION['language']) ? $_SESSION['language'] : 'English';

include '../config.php';
include '../includes/languages.php';  // Include the language file
include '../includes/header.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nira_id = $_POST['nira_id'];

    // Authenticate the voter
    $query = "SELECT * FROM voters WHERE nira_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $nira_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Start session and store language preference
        $_SESSION['voter_id'] = $nira_id;

        // Retrieve the voter's preferred language from the database
        $voter = $result->fetch_assoc();
        $_SESSION['language'] = $voter['language'];  // Store language preference in session

        // Redirect to the voting page
        header("Location: vote.php");
        exit;
    } else {
        $error = $texts[$language]['invalid_nira'];  // Use language-specific error message
    }
}
?>

<main>
    <div class="login-container">
        <h2><?php echo $texts[$language]['login']; ?></h2>
        <?php if ($error): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="nira_id"><?php echo $texts[$language]['nira_id']; ?>:</label>
            <input type="text" id="nira_id" name="nira_id" required>
            <button type="submit"><?php echo $texts[$language]['login']; ?></button>
        </form>
        <p class="register-link"><?php echo $texts[$language]['no_account']; ?> <a href="register.php"><?php echo $texts[$language]['register_here']; ?></a></p>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
