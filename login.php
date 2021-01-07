<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Genuine Fakes Database</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="carouselbackdrop" onload="carouseltimer()" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="georgesbraque3.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img_1535.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img_09331-1.jpg" alt="Third slide">
    </div>
  </div>
</div>
<div class="nav">
  <img src = "image001.png" alt="Error"></img>
</div>
<div class="title">
  <h1 class="maintitle"><a href = "index.php">Picture Database</a></h1>
</div>
<div class="vcenter">
  <div class="jumbotron login_box">
    <h3>Login</h3>
    <form class="login" action="logincheck.php" method="post">
      <label for="password">Password: </label>
      <input type="text" name="password">
      <button type="submit" name="submit">Submit</button>
  </form>
  <span style="color: red"><?php echo $_SESSION['login_failed'] ?></span>
  </div>
</div>
