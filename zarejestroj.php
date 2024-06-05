<?php
session_start();
include 'polaczenie.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; 

    if ($password !== $confirm_password)
    {
        $error_message = "Hasła się nie zgadzają.";
    }
    else
    {
        $sql_check_email = "SELECT id FROM users WHERE email = '$email'";
        $result = mysqli_query($ksiegarnia, $sql_check_email);

        if (mysqli_num_rows($result) > 0)
        {
            $error_message = "Podany email jest już zarejestrowany.";
        }
        else
        {
            $sql_register = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
            if (mysqli_query($ksiegarnia, $sql_register))
            {
               
                $sql_get_user_id = "SELECT id FROM users WHERE email = '$email'";
                $result = mysqli_query($ksiegarnia, $sql_get_user_id);
                $row = mysqli_fetch_assoc($result);
                $user_id = $row['id'];
                
                $_SESSION['user_id'] = $user_id; 
                $_SESSION['user_role'] = 'user';
                header("Location: index.php");
                exit();
            }
            else
            {
                $error_message = "Błąd podczas rejestracji: " . mysqli_error($ksiegarnia);
            }
        }
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
    <title>Rejestracja</title>

    <!--error mess-->
    <?php
    if (isset($error_message))
    {
        echo "<p style='color: red;'>$error_message</p>";
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
        <form action="zarejestroj.php" method="post">
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" name="email" id="email" required></td>
            </tr>
            <tr>
                <td><label for="password">Hasło:</label></td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                <td><label for="confirm_password">Potwierdź hasło:</label></td>
                <td><input type="password" name="confirm_password" id="confirm_password" required></td>
            </tr>
            <tr>
                <th colspan = '2'><button type="submit">Zarejestruj</button></th>
            </tr>
        </form>
    </table>
    
</body>
<nav>
        <a href="index.php" class="back-link">Powrót do strony głównej</a>
    </nav>
    <footer>Lena Krzciuk 2024</footer>

</html>