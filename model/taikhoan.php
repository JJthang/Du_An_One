<?php 
  function insert_taikhoan($user,$pass,$email)
  {
      $sql = "INSERT into taikhoan(user,pass,email) values('$user','$pass','$email')";
      pdo_execute($sql);
  }
?>