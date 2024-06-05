<?php

$ksiegarnia = mysqli_connect('localhost', 'root', '', 'ksiegarnia');

if (!$ksiegarnia)
{
    echo "Połączenie nie udane.";
    mysqli_close($ksiegarnia);
}
?>