<?php
   require 'configDB.php';
   $del_good = $_POST['del'];
   $sql = " DELETE FROM `users_goods` WHERE good_id = :del_good";
   $query = $pdo->prepare($sql);
   $query->bindParam(':del_good', $del_good);
   $query->execute();
   header("Location: cart.php");
?>
