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
    <h1><?php echo $texts[$language]['welcome']; ?> to Votlink App</h1>
    <nav>
        <ul>
            <li><a href="/VoteLinkApp/index.php"><?php echo $texts[$language]['Home']; ?></a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn"><?php echo $texts[$language]['login']; ?></a>
                <div class="dropdown-content">
                    <a href="/VoteLinkApp/Admin/login.php"><?php echo $texts[$language]['admin_login']; ?></a>
                    <a href="/VoteLinkApp/login.php"><?php echo $texts[$language]['voter_login']; ?></a>
                </div>
            </li>
            <li><a href="/VoteLink/voter/register.php"><?php echo $texts[$language]['register']; ?></a></li>
        </ul>
    </nav>
</header>
