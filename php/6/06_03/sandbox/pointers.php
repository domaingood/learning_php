<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
    <title>Pointers</title>
  </head>
  <body>

    <?php
    
      $ages = array(4,8,15,16,23,42);
    
      // current: current pointer value
      echo "1: " . current($ages) . "<br />";
    
      // next: move the pointer forward
      // similar to using 'continue' inside a loop
      next($ages);
      echo "2: " . current($ages) . "<br />";

      next($ages);
      next($ages);
      echo "3: " . current($ages) . "<br />";
    
      // prev: move the pointer backward
      prev($ages);
      echo "4: " . current($ages) . "<br />";
    
      // reset: move the pointer to the first element
      reset($ages);
      echo "5: " . current($ages) . "<br />";

      // end: move the pointer to the last element
      end($ages);
      echo "6: " . current($ages) . "<br />";
    
      // move the pointer past the last element
      next($ages);
      echo "7: " . current($ages) . "<br />";
    
    ?>
    <br />

    <?php
      reset($ages);
      
      // while loop that moves the array pointer
      // similar to foreach
      while($age = current($ages)) {
        echo $age . ", ";
        next($ages);
      }
    ?>
    
  </body>
</html>
