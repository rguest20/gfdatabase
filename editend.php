<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ind = $_POST["ind"];
    $name = $_POST["name"];
    $catalog_number = $_POST["database"];
    $scene = $_POST["scene"];

    $sql = "UPDATE `genuine_fakes_pictues` SET (`database_index`, `picture_name`, `scene`)  = (". $database .", ". $name .", ". $scene .") WHERE `genuine_fakes_pictues`.`gf_index` = 2;";
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "gfdatabase";
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_query($conn, $sql);
?>
