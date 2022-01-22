<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
    <title>Loops: while</title>
  </head>
  <body>

    <?php
      $count = 0;
      while ($count <= 10) {
        if ($count == 5) {
          echo "FIVE, ";
        } else {
          echo $count . ", ";
        }
        $count++;  // increment by 1
      }
      echo "<br />";
      echo "Count: {$count}";
    ?>

    <br />
    <br />
    <?php // On your own exercise
    
      $count = 1;
      while ($count < 20) {
        if($count % 2 == 0) {
          echo "{$count} is even<br />";
        } else {
          echo "{$count} is odd<br />";
        }
        $count++;
      }
    
    ?>
  </body>
</html>
