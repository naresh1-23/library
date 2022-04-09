<?php
    include('connect.php');
    if(isset($_POST['submit'])){
        $name = $_POST['genre'];
 
      $query = "SELECT * FROM book WHERE bookName = '$name'";
      $result = mysqli_query($conn,$query);
      $book_id = mysqli_fetch_assoc($result)['id'];
      $returnquery = "DELETE FROM borrow where book_id = '$book_id'";
      $returnresult = mysqli_query($conn, $returnquery);
      header("Location:../user.php?errmsg=".$msg);
      

  
  
    }
  
?>