<?php
// Create connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gfdatabase";
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_close($conn);

?>
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
    <br>
    <div class="forms jumbotron">
      <h3>Picture Search</h3>
      <form class="picturesearch" action="search.php" method="post">
        <input type=text class="query" name="value" autocomplete="off"> <br />
        <h5>Type of Search</h5>
          <input type = 'radio' name="querytype" value="name" checked>Name</input><br>
          <input type = 'radio' name="querytype" value="style">Artist</input><br>
          <input type = 'radio' name="querytype" value="scene">Scene Number</input><br>
          <input type = 'radio' name="querytype" value="databasenumber">Database Number</input><br>
        <button>Search For a Picture</button>
      </form>
    </div>
    <br>
    <div class = "forms jumbotron">
      <h3>New Picture Upload</h3>
      <form class="pictureuploadform" action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" class="pictureupload" name="file_to_upload" id= "file_to_upload"></input><br />
        <button>Import a New Picture</button>
      </form>
    </div>
  <div class="footer2">
    <p>Made by Ryan Guest 2020</p>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>
function carouseltimer(){
  $('#carouselbackdrop').carousel({
    interval: 2000
  })
}
</script>
</html>
