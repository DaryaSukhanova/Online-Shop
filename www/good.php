<?php
   if (!isset($_SESSION)) session_start();
   require 'configDB.php';
?>

<!DOCTYPE html>

<html lang="ru">
<head>
   <title> Online shop</title>
   <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
   <meta name="viewport" content="width=devix ce-width, initial-scale=1.0">
   <link rel="stylesheet" href="/assets/styles.css">
   <link rel="icon" href="../img/kimono-dress.ico" type="image/x-icon" />
   <!-- <script src="jquery-3.3.1.min.js"></script> -->
</head>
<header>

</header>
<body>
   <div class="wrapper">
      <div class="container">
         <header class="header">

            <div class="active-user"><?
               echo($_SESSION["login"]);
            ?></div>
            <span>Online Shop</span>
            <div class="icons">

               <?php
               $count = count($_COOKIE) - 1;
               
                  if (empty($_SESSION)){
                     echo (
                        "<div class='user-autorization'>
                           <form method='post' action='autorization.php'>
                              <input class='btn-autorization' type='submit' value='' class='button'>
                           </form>
                        </div>");
                     } else {
                        echo(
                           "</div>
                           <div class='user-autorization'>
                           <form method='post' action='delete-session.php'>
                              <input class='logout-btn' type='submit' value='Выйти' class='button'>
                           </form>
                           </div> ");
                           $count = 0;
                           $user_id = $_SESSION['user_id'];
                           $query = $pdo->prepare("SELECT * FROM `users_goods` WHERE user_id = :user_id");
                           $query->bindParam(':user_id', $user_id);
                           $query->execute();
                           while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                              $count++;
                           }
                     }

                        
                     echo (
                        "<div class='cart'>
                           <a href='cart.php'><img src='img/shopping-bag.svg' alt=''></a>");

                           if ($count != 0){
                              echo ("<div class='quantity-cart'><span>".$count."</span>
                        </div>");
                           }

               ?>
             <!-- <img src='img/user_icon.svg' alt=''> -->
            </div>

         </header>
         <main class="main">
            <h1>
               Новинки
            </h1>

            <div class="products">
               <?php
 

               $query = $pdo->query('SELECT * FROM `goods`');
               while ($row = $query->fetch(PDO::FETCH_OBJ)){
                  echo (
                     "<form id=".$row->id." method='post' action='add.php'>
                     <div class='product-card' id='productCard'>
                        <img src=".$row->image.">
                        <div class='interaction'>
                           <input class='quantity' min='1' autocomplete='off'  step='any' type='number' name='quantity' required>
                           <input type='hidden' value='".$row->id."' name='id'>");
                       
                        echo ("<input class='in-cart' type='submit' value='В корзину'>");
                        
                  echo ("
                        </div>
                        <a class='goods-name'>".$row->name."</a>
                        <span>".$row->price." ₽</span>
                     </div>
                     </form>"
                  );
               }
               ?>
            </div>
         </main>

      </div>
  
   </div>

   
</body>

</html>
