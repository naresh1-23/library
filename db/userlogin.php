<?php
  include('connect.php');
  if(isset($_POST['submit'])){
      $email = $_POST['email'];
      $password = $_POST['password'];

      if($email==''){
          $msg = "email is required";
          header('Location:../index.php?errmsg='+$msg);
      }
      if($password==''){
          $msg = "password is required";
          header('Location:../index.php?errmsg='+$msg);
      }  
      $encryptpass = md5($password);
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$encryptpass'";
    $result = mysqli_query($conn,$query);
    
    $row = mysqli_num_rows($result);
    if($row==1){
        $data = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['user_id']= $data['id'];
        header('Location:../user.php');
    }else{
        header('Location:../index.php?errmsg=email and password does not match');
    }


  }

?>