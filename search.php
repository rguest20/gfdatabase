<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST["querytype"];
    $value = $_POST["value"];
}
if ($type == "name") {
    $type = "picture_name";
} elseif ($type == "databasenumber") {
    $type = "database_index";
} elseif ($type == "gfdatabase") {
    $type = "gf_index";
} elseif ($type == "scene") {
    $type = "scene";
} else {
    $type = "picture_file_name";
};
// Create connection and collect search data
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gfdatabase";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql= ("SELECT * FROM `genuine_fakes_pictues` WHERE `" . $type . "` LIKE '%" . $value . "%'");
$search = mysqli_query($conn, $sql);
$results = $search -> fetch_all(MYSQLI_ASSOC);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Genuine Fakes Database - Search</title>
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
    <img src = "image001.jpg" alt="Error"></img>
  </div>
  <div class="title">
    <h1 class="maintitle">Picture Database<h1>
  </div>
    <div class="forms jumbotron">
      <h3>Picture Search</h3>
      <form class="picturesearch" action="search.php" method="post">
        <input type=text class="query" name="value"> <br />
        <h5>Type of Search</h5>
        <select name="querytype">
          <option value="name">Name</option>
          <option value="scene">Scene Number</option>
          <option value="databasenumber">Database Number</option>
          <option value="gfdatabase">Database for Genuine Fakes</option>
        </select><br>
        <button>Search For a Picture</button>
      </form>
    </div>
    <h3>Results</h3>
    <img src = ""
    <?php
    foreach ($results as $x=>$y) {
        echo '<p>Name = '. $y["picture_name"].'</p>';
        echo '<p>Scene= '. $y["scene"].'</p>';
        echo '<img src = "./uploads/'. $y["picture_file_name"] . '" height = "200" width = "200">';
    }
    ?>
  <div class="footer">
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
