<?php
session_start();
?>
<!DOCTYPE html>
<?php
  include('db/connect.php');
    $query = "SELECT * FROM category";
    $result = mysqli_query($conn,$query);

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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="book.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="db/logout.php">Log out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <form action="book.php" method="post">
        <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Categories</span>
                        <select name="genre" id="cars">
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>
                        <option value="<?php echo $row['genre']; ?>"><?php echo $row['genre']; ?></option>
                    <?php } ?>
                </select>
                    </div>
                    <input type="submit" value="submit" name="submit" 
                        class="btn btn-dark">
        </form>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>