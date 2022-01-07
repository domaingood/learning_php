<?php // continue.php
  session_start();

  if (isset($_SESSION['forename']))
  {
    $forename = $_SESSION['forename'];
    $surname  = $_SESSION['surname'];

    echo htmlspecialchars("Welcome back $forename.<br>
          Your full name is $forename $surname.<br>");
  }
  else echo "Please <a href=authenticate2.php>click here</a> to log in.";
?>
