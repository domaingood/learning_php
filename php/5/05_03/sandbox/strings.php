<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
    <title>Strings</title>
  </head>
  <body>
  <?php
  
  echo "Hello World<br />";
  echo 'Hello World<br />';

  $greeting = "Hello";
  $target = "World";
  $phrase = $greeting . " " . $target;
  echo $phrase;
  ?>
  <br />
  <?php
  
  echo "$phrase Again<br />";
  echo '$phrase Again<br />';
  echo "{$phrase}Again<br />";
  
  ?>

  </body>
</html>
