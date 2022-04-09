<?php 
  include('connect.php');
   if(isset($_POST['submit'])){
       $genre = $_POST['genre'];
       $name = $_POST['bookname'];
       $author = $_POST['author'];
     if($name==''){
         $msg = "name is required";
         header('Location:../addbook.php?errmsg='.$msg);
     }        
     if($genre==''){
         $msg = "genre is required";
         header('Location:../addbook.php?errmsg='.$msg);
     }

     if($author==''){
         $msg = "author is required";
         header('Location:../addbook.php?errmsg='.$msg);
     }
     $category = "SELECT * FROM category where genre = '$genre'";
     $result = mysqli_query($conn, $category);
     $categorydata = mysqli_fetch_assoc($result)['id'];
     $query = "INSERT INTO book(bookName,author,category_id) VALUES('$name','$author','$categorydata')";
     if(mysqli_query($conn,$query)){
         $msg = "Signup successfully";
         header('Location:../category.php?msg='.$msg);
     }else{
         $msg = "Error: ".mysqli_error($conn);
         header("Location:../addbook.php?errmsg=".$msg);
     }
   }else{
       $msg = "data is not acceptable";
       header("Location:../addbook.php?errmsg=".$msg);
   }
?>