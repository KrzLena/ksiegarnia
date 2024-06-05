<?php
session_start();
include 'polaczenie.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    // db search
    $sql = "SELECT id, password, role FROM users WHERE email = '$email'";
    $result = mysqli_query($ksiegarnia, $sql);

    if ($row = mysqli_fetch_assoc($result))
    {
        // pass???
        if ($password == $row['password'])
        {
            // save
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_role'] = $row['role'];
            $_SESSION['user_email'] = $row['email'];
            header("Location: index.php");
            exit();
        }
        else
        {
            $error_message = "Nieprawidłowe hasło.";
        }
    }
    else
    {
        $error_message = "Nie znaleziono użytkownika z podanym emailem.";
    }
}

mysqli_close($ksiegarnia);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta name="author" content="Lena Krzciuk">
    <meta name="description" content="Księgarnia internetowa, projekt">
    <meta name="keywords" content="książki, księgarnia, strona internetowa">
    <meta charset="UTF-8">
    <title>Logowanie</title>


<!--error -->
<?php
    if (isset($error_message))
    {
        echo "<p style='color: red;'><b>$error_message</b></p>";
    }
    ?>

    
    <link rel="stylesheet" href="css/styl.css">
    <style>
        body
        {
            background-color: #182c3b;
            color: white;
        }
        .back-link
        {
            background-color: #4680B0;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
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
            position: fixed;
            bottom: 0;
            width: 100%;
            margin: 20px auto 0; 
        }

        table 
        {
            border-collapse: collapse;
            width: 80%;
            margin: 10%;
            height: 300px;
            font-size: 30px;
        }

        th, td 
        {
            border: 1px solid #4680B0;
            padding: 8px;
            text-align: left;
            text-align: center;
        }

        th 
        {
            background-color: #4680B0;
            color: white;
            border: 1px solid #4680B0;
        }

        button
        {
            background-color: #4680B0;
            border: none;
            color:white;
            width:100%;
            height:100%;
            font-size: 30px;
        }
        a{
            font-size: 30px;
        }
        </style>
</head>
<body>
    <table>
        <form action="zalogoj.php" method="post">
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" name="email" id="email" required></td>
            </tr>
            <tr>
                <td><label for="password">Hasło:</label></td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                <th colspan = '2'><button type="submit">Zaloguj</button></th>
            </tr>
        </form>
    </table>
    
    <nav>
        <a href="index.php" class="back-link">Powrót do strony głównej</a>
    </nav>
</body>
<footer>Lena Krzciuk 2024</footer>

</html>