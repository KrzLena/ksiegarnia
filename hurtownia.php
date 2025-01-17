<?php
session_start();
include 'polaczenie.php';

// log???
if (!isset($_SESSION['user_id']))
{
    header("Location: zalogoj.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="pl">
<head>
<meta name="author" content="Lena Krzciuk">
    <meta name="description" content="Księgarnia internetowa, projekt">
    <meta name="keywords" content="książki, księgarnia, strona internetowa">
    <meta charset="UTF-8">
    <title>Zaoby</title>
    <link rel="stylesheet" href="css/styl.css">
    <style>
        body
        {
            font-family: Arial, sans-serif;
            background-color: #182c3b;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header
        {
            background-color: #4680B0;
            color: white;
            padding: 1em;
            text-align: center;
        }

        nav a
        {
            margin: 0 1em;
            color: white;
            text-decoration: none;
        }

        footer
        {
            background-color: #4680B0;
            color: white;
            text-align: center;
            padding: 1em;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        form
        {
            margin: 2em auto;
            padding: 2em;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }

        label
        {
            display: block;
            margin-bottom: 0.5em;
        }

        input[type="text"], input[type="email"], input[type="password"]
        {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button
        {
            background-color: #4680B0;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        
        table
        {
            border-collapse: collapse;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td
        {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th
        {
            background-color: #f2f2f2;
        }
        .back-link
        {
            background-color: #4680B0;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: inline-block;
            margin-top: 20px;
            text-align: center;
        }

        .back-link:hover
        {
            background-color: #4680B0;
        }
        nav
        {
            text-align: center;
        }

        footer
        {
            background-color: #4680B0;
            color: white;
            text-align: center;
            padding: 1em;
            position: fixed;; 
            bottom: 0;
            width: 100%;
            margin: 20px auto 0; 
        }


    </style>
</head>
<body>
    <header>
        <h1>Zasoby księgarni</h1>
    </header>

    <form action="szukaj.php" method="post">
        <label for="search_query">Szukaj książki:</label>
        <input type="text" name="search_query" id="search_query" required>
        <button type="submit">Szukaj</button>
    </form>

 
 

    <nav>
        <a href="index.php" class="back-link">Powrót do strony głównej</a>
    </nav>

    <footer>Lena Krzciuk 2024</footer>
</body>
</html>