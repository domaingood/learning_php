<?php // Example 27-4: index.php
  session_start();
  require_once 'header.php';

  echo "<div class='center'>Welcome to Robin's Nest,";

  if ($loggedin) echo " $user, you are logged in";
  else           echo ' please sign up or log in';

  echo <<<_END
      </div><br>
    </div>
    <div data-role="footer">
      <h4>Web App from <i><a href='http://lpmj.net/5thedition'
      target='_blank'>Learning PHP MySQL & JavaScript Ed. 5</a></i></h4>
    </div>
  </body>
</html>
_END;
?>
