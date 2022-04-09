<?php
  include('db/connect.php');
session_start();
if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
    header('Location:index.php');
  }

  $user_id = $_SESSION['user_id'];
  $query = "SELECT * FROM users WHERE id = '$user_id'";
  $result = mysqli_query($conn, $query);
  $data = mysqli_fetch_assoc($result);
  $book = "SELECT * FROM borrow WHERE user_id = '$user_id'";
  $bookresult = mysqli_query($conn, $book);
  $bookid = mysqli_fetch_assoc($bookresult)['book_id'];
  $top = "SELECT * FROM book WHERE id = '$bookid'";
  $topresult = mysqli_query($conn, $top);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="book.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_book.php">Return book</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="card" style="width: 50rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $data['username']; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $data['email']; ?></h6>
    <p class="card-text"></p>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Book Name</th>
      <th scope="col">Writer</th>
    </tr>
  </thead>
  <tbody>
      <?php $num = 0; while($row = mysqli_fetch_assoc($topresult)){ $num=$num+1;?>
    <tr>
      <th><?php echo $num; ?></th>
      <td><?php echo $row['bookName']; ?></td>
      <td><?php echo $row['author']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
  </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
