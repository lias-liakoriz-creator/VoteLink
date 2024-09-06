<?php
session_start();  // Start the session to access language preference

// Handle language change
if (isset($_POST['language'])) {
    $_SESSION['language'] = $_POST['language'];  // Store the selected language in session
}

// Check if a language is set via session, otherwise default to English
$language = isset($_SESSION['language']) ? $_SESSION['language'] : 'English';

include 'conn.php';
include 'includes/languages.php';  // Include the language file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votlink App</title>
    <link rel="stylesheet" href="/VoteLink/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Welcome to Votlink App</h1>
        <nav>
            <ul>
                <li><a href="/VoteLink/index.php">Home</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Login</a>
                    <div class="dropdown-content">
                        <a href="/VoteLinkApp/Admin/login.php">Admin Login</a>
                        <a href="/VoteLinkApp/login.php">Voter Login</a>
                    </div>
                </li>
                <li><a href="/VoteLink/voter/register.php">Register</a></li>
            </ul>
        </nav>
        <!-- Language Selector Dropdown -->
        <form method="post" action="" style="float: right;">
            <select name="language" onchange="this.form.submit()">
                <option value="English" <?php echo ($language == 'English') ? 'selected' : ''; ?>>English</option>
                <option value="Luganda" <?php echo ($language == 'Luganda') ? 'selected' : ''; ?>>Luganda</option>
                <option value="Karamojong" <?php echo ($language == 'Karamojong') ? 'selected' : ''; ?>>Karamojong</option>
                <option value="Kiswahili" <?php echo ($language == 'Kiswahili') ? 'selected' : ''; ?>>Kiswahili</option>
            </select>
        </form>
    </header>

    <!-- Rest of the home page content -->

</body>
</html>
