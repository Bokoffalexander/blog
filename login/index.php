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
   if (isset($_POST['email'])) {
     $current_user = $_POST['email'];
   } else {
     $current_user = "...";
   }
   echo "User: ".$current_user; 
   echo " LOGIN";?>

 <form action="index.php" method="POST">
     <p>Email:<br><input type="text" name="email"> </p>
     <p>Password: <br> <input type="password" name="password"> </p> <br>
     <input type="submit">
 </form>

 <br>
 Your email is
 <b>
 <?php if (isset($_POST['email'])) {
     echo $_POST['email'];
     } else {
      echo "...";
     }
      ?>
 </b> <br>
 Your password is <b>
 <?php if (isset($_POST['password'])){
     echo $_POST['password'];
     } else {
         echo "...";
     }
      ?>
 </b> <br>
 <hr>

 <?php

 $host = "188.225.35.99";
 $db = "laravel_db";
 $port = 3316;
 $username = "laravel";
 $pass = "password";
 $db_table = "Bokoff";


 if (isset($_POST['email'])
 && isset($_POST['password']))
 {
 // Переменные с формы
 $email = $_POST['email'];
 $password = $_POST['password'];
 // Параметры для подключения

 // Имя Таблицы БД
 // Подключение к базе данных
 try {
 $db = new PDO("mysql:host=$host;port=$port;dbname=$db",$username, $pass);
 // Устанавливаем корректную кодировку
 // Собираем данные для запроса
 // Подготавливаем SQL-запрос
   $stm = $db->query('SELECT * FROM Bokoff');
   $rows = $stm->fetchAll();

   $res=false;
   // iterate over array by index and by name
   foreach($rows as $row) {
        if ($row[1]==$email && $row[2]==$password) {$res=true; break;}
        //printf("$row[0] $row[1] $row[2]\n");

   }
   
 // Запишим в переменую, что запрос отрабтал
  }
  catch (PDOException $e) {
 // Если есть ошибка соединения или выполнения запроса, выводим её
 print "Ошибка!: " . $e->getMessage() .
 "<br/>"; }

    $login_is = false;
    $login_user = "...";
   
 if ($res) { echo "Успех.<br> Вы проверены в БД.<hr>"; 
            echo "You are logged in. <br> Go to <b>home</b>";
              $login_is = true;
              $login_user = $email;
 } else {echo "Неуспех. <br> Неверный логин или пароль.<hr>";}
 } // end of very up if

   
   
 ?>

 </body>
 </html>