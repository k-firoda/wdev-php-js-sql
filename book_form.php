<?php

   $connection = mysqli_connect('localhost','root','','book_db');

   if(isset($_POST['send'])){
      $data = purify($_POST);
      extract($data);

      $request = " insert into book_form (name, email, phone, address, location, guests, arrivals, leaving) values('$name','$email','$phone','$address','$location','$guests','$arrivals','$leaving') ";
      $execute = mysqli_query($connection, $request);
      if(!$execute)  echo mysqli_error($connection);

      if(mysqli_insert_id($connection) > 0)
         header('location:book.php'); 
      else{
         echo 'something went wrong please try again!';
      }

   }


   function purify($raw){
      $purified = [];
      foreach($raw as $key => $value){
         $purified[$key] = trim(stripslashes(htmlspecialchars($value)));
      }
      return $purified;
   }
