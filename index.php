<?php
require 'login/index.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>PHP blog</title>
</head>
<body>
  
  <a href="http://188.225.35.99:8000/blog/index.php" class="home">HOME</a> -
   <a href="http://188.225.35.99:8000/blog/register/index.php" class="home">register</a> -
   <a href="http://188.225.35.99:8000/blog/login/index.php" class="home">login</a> - 
   <a href="http://188.225.35.99:8000/blog/logout/index.php" class="home">logout</a>
   <br>
  
  <?php
  //namespace blog;
    echo Foo::$login_is."<br>";
    echo Foo::$login_user."<br>";
    echo Foo::$login_user_id."<br>";
  ?> 
  
  <div> Please <b>register</b> or <b>login</b> to continue. </div>
 

</body>
</html>