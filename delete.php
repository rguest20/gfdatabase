<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ind = $_POST["file"];
    echo $ind;
}
