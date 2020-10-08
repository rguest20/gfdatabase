<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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
    <img src="image001.png" alt="Error"></img>
  </div>
  <div class="title">
    <h1 class="maintitle"><a href="index.php">Picture Database</a></h1>
  </div>
  <br>
  <div class="forms jumbotron">
    <h3>More information</h3>
    <h5>Upload Status</h5>
    <?php
      // Check if image file is a actual image or fake image
      if (isset($_POST["submit"])) {
          $check = getimagesize($_FILES["file_to_upload"]["tmp_name"]);
          if ($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }

      // Check if file already exists
      if (file_exists($target_file)) {
          echo "Sorry, file already exists. <br>";
          $uploadOk = 0;
      }

      // Allow certain file formats
      if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif") {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded. This is the file we will be working on: <br>";
          $filename = $_FILES["file_to_upload"]["name"];
      // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)) {
              echo "The file ". htmlspecialchars(basename($_FILES["file_to_upload"]["name"])). " has been uploaded. Please input extra detail about this file: <br> ";
          } else {
              echo "Sorry, there was an error uploading your file.";
          }
          $filename = $_FILES["file_to_upload"]["name"];
      }
      echo "<img src= 'uploads/". $filename . "' alt='Uploaded file' height = 200 width = 200> <br>";
       ?>

    <h5>Input file attributes</h5>
    <form class="uploaddetails" action="confirm.php" method="post" id="attributesform">
      <input type="text" name='filename' value="<?php echo $filename ?>" readonly id="filename"> <br>
      <label for="name">Name of The Work</label>
      <input type="text" name="name" placeholder="Name" required><br>
      <label for="style">In style of</label>
      <input type="text" name="style" placeholder="Artist Name" required><br>
      <label for="database">Database Number</label>
      <input type="text" name="database" placeholder="Database Number" required><br>
      <label for="scene">Scene Number</label>
      <input type="text" name="scene" placeholder="Scene Number" required><br>
      <small>If adding multiple scenes, please use a full stop followed by a space (i.e. scenes 3 ,6 and 8 would be "3. 6. 8.")</small><br>
      <small>For a single scene, just type the number (i.e. scene 53 would be "53")<br>
        <button type="submit" form="attributesform" value="Submit">Submit Data</button>
    </form>
    <div class = "cancelupload">
      <button type="button" onclick="deleteImage()">Cancel Upload</button>
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
<script>
  function deleteImage() {
    let confirmation = confirm("This will delete the image and may cause adverse effects to the database. Are you sure?")
    if (confirmation === true){
      $.ajax({
        url: 'cancel.php',
        data: {
          'file': './uploads/<?php echo $filename ?>'
        },
        method: 'GET',
      }) //ajax
      window.location = "./index.php"
    } else {
      return
    }
  }
</script>

</html>
