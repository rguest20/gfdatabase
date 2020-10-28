<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ind = $_POST["file"];
}

// Create connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gfdatabase";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM `genuine_fakes_pictues` WHERE `gf_index` = ". $ind ."";
$search = mysqli_query($conn, $sql);
$results = $search -> fetch_all(MYSQLI_ASSOC);
$filename = $results[0]['picture_file_name'];
$picture_name = $results[0]['picture_name'];
$catalog_number = $results[0]['database_index'];
$scene = $results[0]['scene'];
$artist = $results[0]['Artist'];

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
    <img src="image001.png" alt="Error"></img>
  </div>
  <div class="title">
    <h1 class="maintitle"><a href="index.php">Picture Database</a></h1>
  </div>
  <br>
  <div class="forms jumbotron">
    <h3>Edit Information</h3>
    <h5>Image</h5>
    <?php
      echo "<img src= 'uploads/". $filename . "' alt='Uploaded file' height = 200 width = 200> <br>";
    ?>
    <h5>Input file attributes</h5>
    <form class="uploaddetails" action="editend.php" method="post" id="attributesform">
      <input type="text" name='filename' value="<?php echo $filename ?>" readonly id="filename"> <br>
      <input type="text" name='ind' value = "<?php echo $ind ?>" readonly><br>
      <label for="name">Name of The Work</label>
      <input type="text" name="name" placeholder="Name" value = "<?php echo $picture_name ?>" required><br>
      <label for="style">In style of</label>
      <input type="text" name="style" placeholder="Artist Name" value = "<?php echo $artist ?>" required><br>
      <label for="database">Database Number</label>
      <input type="text" name="database" placeholder="Catalog Number" value = "<?php echo $catalog_number ?>" required><br>
      <label for="scene">Scene Number</label>
      <input type="text" name="scene" placeholder="Scene Number" value = "<?php echo $scene ?>" required><br>
      <small>If adding multiple scenes, please use a full stop followed by a space (i.e. scenes 3 ,6 and 8 would be "3. 6. 8.")</small><br>
      <small>For a single scene, just type the number (i.e. scene 53 would be "53")<br>
        <button type="submit" form="attributesform" value="Submit">Submit Data</button>
    </form>
    <div class = "cancelupload">
      <button type="button" onclick="">Cancel Upload</button>
    </div>
  </div>
  <div class="footer2">
    <p>Made by Ryan Guest 2020</p>
  </div>
</body>
<script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>
function carouseltimer() {
    $('#carouselbackdrop').carousel({
      interval: 2000
    })
  }
</script>

</html>
