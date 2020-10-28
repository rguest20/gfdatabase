<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ind = $_POST["ind"];
    $name = $_POST["name"];
    $catalog_number = $_POST["database"];
    $scene = $_POST["scene"];
    $artist = $_POST["style"]

    $sql = "UPDATE `genuine_fakes_pictues` SET `database_index` = '". $catalog_number ."' , `picture_name` = '". $name ."' , `Artist` = '". $style ."' `scene` = '". $scene ."' WHERE `genuine_fakes_pictues`.`gf_index` = ". $ind ."";
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "gfdatabase";
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}
  header("Location: search.php");
