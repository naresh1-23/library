<?php
session_start();
?>
<!DOCTYPE html>
<?php
  include('db/connect.php');
  if(isset($_POST['submit'])){
    $genre = $_POST['genre'];
    $query = "SELECT * FROM category where genre = '$genre'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result)['id'];
    $categoryquery = "SELECT * FROM book where category_id = '$data'";
    $resultt = mysqli_query($conn,$categoryquery);

  }
?>
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
          <a class="nav-link active" aria-current="page" href="user.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="book.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="db/logout.php">Log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Book Name</th>
      <th scope="col">Writer</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
      <?php $num=0; while($row = mysqli_fetch_assoc($resultt)){  $num=$num+1;?>
    <tr>
      <th><?php echo $num; ?></th>
      <td><?php echo $row['bookName']; ?></td>
      <td><?php echo $row['author']; ?></td>
      <?php $bookid   = $row['id'];
            $query = "SELECT * FROM borrow WHERE book_id = '$bookid'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_num_rows($result);
            if($row == 0){
      ?>

      <td><a href="borrow.php">available</a></td>
      <?php }else{ ?>
        <td><a href="#">unavailable</a></td>
        <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
</table>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>