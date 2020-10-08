<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $database = $_POST["database"];
    $scene = $_POST["scene"];
    $style = $_POST["style"];
    $fileaddress = $_POST["filename"];
}
// Create connection and collect search data
$servername = "127.0.0.1:3306";
$username = "u697980380_genuinefakes";
$password = "JohnMyatt1";
$dbname = "u697980380_gfdatabase";
$conn = new mysqli($servername, $username, $password, $dbname);
$sqlindexcheck = "SELECT * FROM `genuine_fakes_pictues`";
$indexcheck = mysqli_query($conn, $sqlindexcheck);
$indexcheckresults = $indexcheck -> fetch_all(MYSQLI_ASSOC);
$highestindex = 0;
foreach ($indexcheck as $x => $y) {
    if ($y['gf_index'] > $highestindex) {
        $highestindex = $y['gf_index'];
    };
};
if (strpos($scene, '.') == false) {
    $scene = $scene . '.';
}
$highestindex += 1;
$sql= "INSERT INTO `genuine_fakes_pictues` (`gf_index`, `picture_file_name`, `database_index`, `picture_name`, `scene`) VALUES ('". $highestindex ."', '" . $fileaddress . "', '" . $database . "', '" . $name . "', '". $scene ."')";
$upload = mysqli_query($conn, $sql);
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
      <h3>Database Updated</h3>
      <p> Your picture has been uploaded and information updated in the database.  You will be redirected to the homepage in 5 seconds or click <strong><a href="index.php">here</a></strong> to go back now.
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
<script>
var url= "./index.php";
setTimeout(function(){ document.location.href = url }, 5000)
</script>
</html>
