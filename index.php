<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta name="author" content="Lena Krzciuk">
    <meta name="description" content="Księgarnia internetowa, projekt">
    <meta name="keywords" content="książki, księgarnia, strona internetowa">
    <meta charset="UTF-8">
    <title>Strona główna</title>
    <link rel="stylesheet" href="css/styl.css">
    <style>
         body 
        {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #182c3b;
            color: white;
        }
        
        header
        {
            background-color: #4680B0;
            color: white;
            text-align: center;
            padding: 1em 0;
            position: relative;
        }
        nav
        {
            text-align: center;
            margin-bottom: 20px; 
        }
        nav a
        {
            margin: 0 10px; 
            color: white;
            text-decoration: none;
        }
        footer
        {
            background-color: #4680B0;
            color: white;
            text-align: center;
            padding: 1em;
            position: fixed; 
            bottom: 0;
            width: 100%;
            margin: 20px auto 0; 
        }
        .logout
        {
            position: absolute; 
            top: 10px;
            right: 10px;
        }
        .admin-buttons, .user-buttons
        {
            text-align: center;
            margin-bottom: 20px;
        }
        .admin-buttons button, .user-buttons button
        {
            background-color: #4680B0;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Witamy w Księgarni Internetowej</h1>
        <?php
        if (isset($_SESSION['user_id']))
        {
            echo '<button onclick="window.location.href=\'wylogoj.php\'" class="logout">Wyloguj</button>';
        }
        ?>
        <nav>
            <?php
            if (!isset($_SESSION['user_id']))
            {
                echo '<a href="zalogoj.php">Zaloguj</a>';
                echo '<a href="zarejestroj.php">Zarejestruj</a>';
                echo '<a href="hurtownia.php">Przeglądaj zasoby</a>';
            } 
            elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin')
            {
                echo '<div class="admin-buttons">';
                echo '<button onclick="window.location.href=\'dodaju.php\'">Zarzązaj użytkownikami</button>';
                echo '<button onclick="window.location.href=\'dodajk.php\'">Zarzązaj książkami</button>';
                echo '</div>';
            }
            else
            {
                echo '<a href="hurtownia.php">Przeglądaj zasoby</a>';

            }
            
            ?>
        </nav>
    </header>
    <footer>Lena Krzciuk 2024</footer>
</body>
</html>