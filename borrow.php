<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body >
<br><br><br><br><br><br><br>

    <!-- login -->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-6">
                <form method="post" action="db/borrow.php">
                    <h2>borrow:</h2>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Enter the User Name </span>
                        <input placeholder="user name" type="text" name="username" class="form-control"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Book Name </span>
                        <input placeholder="book name" type="text" name="name" class="form-control"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>

                   
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Return Date </span>
                        <input placeholder="returndate" type="date" name="borrow" class="form-control"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <hr />

                    <input type="submit" value="submit" name="submit" style="float:right;"
                        class="btn btn-dark">
                </form>
            </div>
        </div>
    </div>

    
</body>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>


</html>