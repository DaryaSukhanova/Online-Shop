<?php
   header("Location: cart.php");
   // is_numeric($_POST['quantity']) ? $_POST['quantity'] : 1;
   if (empty($_SESSION)){
      if (is_numeric($_POST['quantity'])) {
         setcookie($_POST['id'], $_POST['quantity']);
      }

         if (isset($_POST['del'])){
            setcookie($_POST['del'],0, time()-10);
         }
      // print_r($_COOKIE);
   } else{
      session_start();
      require 'configDB.php';

      $user_id = $_SESSION["user_id"];


      $id = $_POST['id'];
      $quantity = $_POST['quantity'];

      $sql1 = "INSERT INTO `users_goods` (user_id, good_id, quantity) 
         SELECT :user_id, id, :quantity
         FROM
            `goods`
         WHERE id = $id";

      $query = $pdo->query('SELECT * FROM `users_goods`');
      while ($row = $query->fetch(PDO::FETCH_OBJ)) {
         echo ($row->good_id);
         if ($row->good_id == $id){
            $sql2 = "UPDATE users_goods SET quantity = :quantity WHERE good_id = :id";
            break;
         }
      }

      $query1 = $pdo->prepare($sql1);
      $query1->bindParam(':user_id', $user_id);
      $query1->bindParam(':quantity', $quantity);
      $query1->execute();
      $query2 = $pdo->prepare($sql2);
      $query2->bindParam(':quantity', $quantity);
      $query2->bindParam(':id', $id);
      $query2->execute();
      print_r($query);
   }

   
?>