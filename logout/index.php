<!DOCTYPE html>
<html>
<head>
  <title>PHP blog</title>
</head>
<body>

  <?php
  require "/var/www/laravel/public/blog/global.php";
  ?>
  
  <a href="http://188.225.35.99:8000/blog/index.php" class="home">HOME</a> -
   <a href="http://188.225.35.99:8000/blog/register/index.php" class="home">register</a> -
   <a href="http://188.225.35.99:8000/blog/login/index.php" class="home">login</a> - 
   <a href="http://188.225.35.99:8000/blog/logout/index.php" class="home">logout</a>
   <br>

  <?php
   $login_is = false;
   $login_user = "...";
  ?>
  
<div>
  You are logged out.
</div>
<div>
  Please <b>register</b> or <b>login</b> to continue.
</div>
</body>
</html>