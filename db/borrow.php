<?php 
session_start(); 
  include('connect.php');
   if(isset($_POST['submit'])){
       $username = $_POST['username'];
       $returndate = $_POST['borrow'];
       $book = $_POST['name'];
       $bookquery = "SELECT * FROM book WHERE bookName='$book'";
       $result  = mysqli_query($conn, $bookquery);
       $book_id = mysqli_fetch_assoc($result)['id'];
       $userquery = "SELECT * FROM users WHERE username='$username'";
       $userresult  = mysqli_query($conn, $userquery);
       $user_id = mysqli_fetch_assoc($userresult)['id'];
      


           

        
        $query = "INSERT INTO borrow(user_id,returndate,book_id ) VALUES('$user_id','$returndate','$book_id')";
        if(mysqli_query($conn,$query)){
            $msg = "Book Inserted";
            header('Location:../user.php?msg='.$msg);
        }else{
            $msg = "Error: ".mysqli_error($conn);
            header("Location:../borrow.php?errmsg=".$msg);
        }
    }else{
        $msg = "data is not acceptable";
        header("Location:../borrow.php?errmsg=".$msg);
     } 
?>