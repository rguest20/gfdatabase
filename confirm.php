<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $database = $_POST["database"];
    $scene = $_POST["scene"];
    $style = $_POST["style"];
    $fileaddress = $_POST["filename"];
}
// Create connection and collect search data
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gfdatabase";
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
$highestindex += 1;
$sql= "INSERT INTO `genuine_fakes_pictues` (`gf_index`, `picture_file_name`, `database_index`, `picture_name`, `scene`) VALUES ('". $highestindex ."', '" . $fileaddress . "', '" . $database . "', '" . $name . "', '". $scene ."')";
$upload = mysqli_query($conn, $sql);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Your picture has been uploaded, you will be redirected to the main page after 5 seconds or press <a href = "index.php">here</a> to go back now.</h1>
  </body>
  <script>
  var url= "./index.php";
  setTimeout(function(){ document.location.href = url }, 5000)
  </script>
</html>
