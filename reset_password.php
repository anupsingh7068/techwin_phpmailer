<?php 

include "config.php";

if(isset($_POST['submit'])){

$email = $_POST['email'];

$sql = "SELECT * FROM users where email = '$email'";

$result = mysqli_query($conn , $sql);

if(mysqli_num_rows($result)>0){

    

}
else{
echo "mail not found  ";

}

}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>php mailer</title>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <fieldset>
  <div class="row">

  <form action="" method="post">
 
  <div class="col-4">
    <input type="text" class="form-control" placeholder="Enter the Email" aria-label="Email" name="email" >
  </div>
  <div class="col">
   <button type="submit" name="submit" >submit</button>
  </div>
  </form>
</div>
</fieldset>
  </body>
</html>