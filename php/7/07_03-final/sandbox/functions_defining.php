<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
    <title>Functions: Defining</title>
  </head>
  <body>

    <?php
    
      function say_hello() {
        echo "Hello World!<br />";
      }
    
      say_hello();
      
      function say_hello_to($word) {
        echo "Hello {$word}!<br />";
      }

      say_hello_to("World");
      say_hello_to("Everyone");
      
      say_hello_loudly();
      
      function say_hello_loudly() {
        echo "HELLO WORLD!<br />";
      }

      // function say_hello_loudly() {
      //   echo "We can't redefine a function.";
      // }
      
    ?>
  </body>
</html>
