<?php

class Foo {
  public static $login_is = false;
  public static $login_user = "...";
  public static $login_user_id = null;
}

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
   $login_is = false;
   $login_user = "...";
   $login_user_id = null;
   // iterate over array by index and by name
   foreach($rows as $row) {
        if ($row[1]==$email && $row[2]==$password) {$res=true; $login_user_id = $row[0]; break;}
        //printf("$row[0] $row[1] $row[2]\n");

   }
   
 // Запишим в переменую, что запрос отрабтал
  }
  catch (PDOException $e) {
 // Если есть ошибка соединения или выполнения запроса, выводим её
 print "Ошибка!: " . $e->getMessage() .
 "<br/>"; }

    
   
 if ($res) { echo "Успех.<br> Вы проверены в БД.<hr>"; 
            echo "You are logged in. <hr>";
        
            
              Foo::$login_is = true;
              Foo::$login_user = $email;
              Foo::$login_user_id = $login_user_id;
              echo "login_user_id = ".$login_user_id."<br>";
              
               $db_table = "Entry";
            
                echo "<form action='index.php' method='GET'>";
                echo "<p><br><input type='text' name='entry'> </p>";
                echo "<input type='submit'>";
                echo "</form>";

                   if (isset($_GET['entry'])) {
                    // Переменные с формы
                    $entry = $_GET['entry'];
              
                    $db = new PDO("mysql:host=$host;port=$port;dbname=$db",$username, $pass);
                    // Устанавливаем корректную кодировку
                    // Собираем данные для запроса
                    $data = array(
                    'entry' => $entry,
                    'user_id' => $login_user_id );
                    // Подготавливаем SQL-запрос
                    $query = $db->prepare(
                    "INSERT INTO $db_table (entry, user_id) values (:entry, :user_id)");
                    // Выполняем запрос с данными
                    $query->execute($data); }


                   
            
 } else {echo "Неуспех. <br> Неверный логин или пароль.<hr>";}
 } // end of very up if

   
   
 ?>

 </body>
 </html>