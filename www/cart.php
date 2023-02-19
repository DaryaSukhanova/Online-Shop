<? session_start(); ?>

<!DOCTYPE html>
<html lang="ru">

<head>
   <title><?= "Online shop"; ?></title>
   <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
   <meta name="viewport" content="width=devix ce-width, initial-scale=1.0">
   <link rel="stylesheet" href="/assets/styles.css">
   <link rel="icon" href="../img/kimono-dress.ico" type="image/x-icon" />
</head>
<header>

</header>
<body>
   <div class="wrapper">
      <div class="container">
         <header class="header-cart">
            <a href="good.php">Online Shop</a>
         </header>
         <main class="main">
            <h1>Корзина</h1>
            <div class='selected-products'>
               <?php
               
               $sum = 0;
               
               require 'configDB.php';
               if (empty($_SESSION)) {
                  $array_keys = array_keys ($_COOKIE);
                  $count = count($array_keys);
                  for ($i = 1; $i<$count; $i++){
                     $query = $pdo->prepare("SELECT * FROM `goods` WHERE id = :id");
                     $query->bindParam(':id', $array_keys[$i]);
                     $query->execute();
                     if ($row = $query->fetch(PDO::FETCH_OBJ)) {
                           echo "<div class='cart-product'>
                              <img class='cart-image' src=".$row->image.">
                              <span class='cart-name'>".$row->name."</span>
                              <span class='cart-price'>".$_COOKIE[$array_keys[$i]]." * ".$row->price." ₽ = ".$_COOKIE[$array_keys[$i]]*$row->price."  ₽</span>
                              <form id=".$i." method='post' action='add.php' class='cart-delete'>
                                 <input type='hidden' value='".$array_keys[$i]."' name='del'>
                                 <input type='submit' value='Удалить' class='button'>
                              </form>
                           </div>";
                     };
                           $sum = $sum + $_COOKIE[$array_keys[$i]]*$row->price;
                  }
               }
               else {
                  $user_id = $_SESSION['user_id'];
                  $query = $pdo->prepare("SELECT id, name, price, image, quantity FROM goods, users_goods WHERE id IN (SELECT good_id FROM users_goods WHERE user_id = :user_id) AND user_id = :user_id AND good_id = id");
                  $query->bindParam(':user_id', $user_id);
                  $query->execute();
                  while ($row = $query->fetch(PDO::FETCH_OBJ)){
                     echo "<div class='cart-product'>
                        <img class='cart-image' src=".$row->image.">
                        <span class='cart-name'>".$row->name."</span>
                        <span class='cart-price'>".$row->quantity." * ".$row->price." ₽ = ".$row->quantity*$row->price."  ₽</span>
                        <form id=".$row->id." method='post' action='delete.php' class='cart-delete'>
                           <input type='hidden' value='".$row->id."' name='del'>
                           <input type='submit' value='Удалить' class='button'>
                        </form>
                     </div>";
                     $sum = $sum + $row->quantity*$row->price;   
                  }
               }
               
               ?>
            </div>
            <div class='final-price'>
               <span>Итого: <? echo $sum;?> ₽</span>
            </div>


         </main>
         <footer class="footer">

         </footer>
      </div>
   </div>
</body>

</html>
