<?php
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
};

$type = "";
$value = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["querytype"])) {
        $type = $_POST["querytype"];
    }
    $value = $_POST["value"];
};
if ($type == "databasenumber") {
    $type = "database_index";
    $sqlcount = "SELECT count(*) FROM `genuine_fakes_pictues` WHERE `" . $type . "` = '" . $value . "'";
    $sql= "SELECT * FROM `genuine_fakes_pictues` WHERE `" . $type . "` = '" . $value . "'";
} elseif ($type == "style") {
    $type = "style";
    $sqlcount = "SELECT count(*) FROM `genuine_fakes_pictues` WHERE `" . $type . "` LIKE '%" . $value . "%'";
    $sql= "SELECT * FROM `genuine_fakes_pictues` WHERE `" . $type . "` = '" . $value . "'";
} elseif ($type == "scene") {
    $type = "scene";
    $sqlcount= "SELECT count(*) FROM `genuine_fakes_pictues` WHERE `" . $type . "` LIKE '%" . $value . ".%'";
    $sql= "SELECT * FROM `genuine_fakes_pictues` WHERE `" . $type . "` LIKE '% " . $value . ".%' OR `" . $type . "` LIKE '" . $value . ".%'";
} else {
    $type = "picture_name";
    $sqlcount = "SELECT count(*) FROM `genuine_fakes_pictues` WHERE `" . $type . "` LIKE '%" . $value . "%'";
    $sql= "SELECT * FROM `genuine_fakes_pictues` WHERE `" . $type . "` LIKE '%" . $value . "%'";
};


// Create connection and collect search data
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "gfdatabase";
$conn = new mysqli($servername, $username, $password, $dbname);
$search = mysqli_query($conn, $sqlcount);

$query_data = mysqli_fetch_row($search);
$numrows = $query_data[0];
$rows_per_page = 10;
$lastpage      = ceil($numrows/$rows_per_page);
$pageno = (int)$pageno;
if ($pageno > $lastpage) {
    $pageno = $lastpage;
};
if ($pageno < 1) {
    $pageno = 1;
};
$limit = 'LIMIT ' .($pageno - 1) * $rows_per_page .',' .$rows_per_page;

$actualsql = $sql . $limit;
$result = mysqli_query($conn, $actualsql);
$results = $result -> fetch_all(MYSQLI_ASSOC);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <img src="image001.png" alt="Error"></img>
  </div>
  <div class="title">
    <h1 class="maintitle"><a href = "index.php">Picture Database</a></h1>
  </div>
  <br>
  <div class="forms jumbotron">
    <h3>Picture Search</h3>
    <form class="picturesearch" action="search.php" method="post">
      <input type=text class="query" name="value" autocomplete="off" autofocus> <br />
      <h5>Type of Search</h5>
      <input type='radio' name="querytype" value="name" <?php if ($type == "picture_name") {
    echo "checked";
} ?>>Name</input><br>
      <input type='radio' name="querytype" value="style" <?php if ($type == "style") {
    echo "checked";
} ?>>Artist</input><br>
      <input type='radio' name="querytype" value="scene" <?php if ($type == "scene") {
    echo "checked";
} ?>>Scene Number</input><br>
      <input type='radio' name="querytype" value="databasenumber" <?php if ($type == "database_index") {
    echo "checked";
} ?>>Catalog Number</input><br>
      <button>Search For a Picture</button>
    </form>
    <strong><a href="index.php">Back to Home</a></strong>
  </div>
  <br>
  <div class="forms jumbotron">
    <h3>Results</h3>
    <?php
    foreach ($results as $x=>$y) {
        echo "<div class = 'searchresult'>";
        echo "<hr>";
        echo "<div class = 'indexofsearch'>";
        echo '<p>Index: '. $y["gf_index"] . '</p>';
        echo "</div>";
        echo '<img src = "./uploads/'. $y["picture_file_name"] . '" height = "200" width = "200" class="searchimage">';
        echo "<div class = 'pictureinformation'>";
        echo '<p>Name: '. $y["picture_name"].'</p>';
        echo '<p>Artist: '. $y['Artist'].'<p>';
        $scene = str_replace(".", ",", $y['scene']);
        $scenetrimmed = rtrim($scene, ", ");
        echo '<p>Scene: '. $scenetrimmed .'</p>';
        echo '<p>Database number: '. $y["database_index"] .'</p>';
        echo "</div>";
        echo "<button type ='button' onclick='ed(\"". $y['gf_index'] ."\")'>Edit</button> <button type='button' onclick = \"del(". $y['gf_index'] .")\"> Delete </button>";
        echo "</div>";
    }
    echo "<div class = 'pagination'>";
    if ($pageno == 1) {
        echo " FIRST < ";
    } else {
        echo " <strong><a href='{$_SERVER['PHP_SELF']}?pageno=1'>FIRST</a></strong> ";
        $prevpage = $pageno-1;
        echo " <strong><a href='{$_SERVER['PHP_SELF']}?pageno=$prevpage'><</a></strong> ";
    }
    echo " ( Page $pageno of $lastpage ) ";
    if ($pageno == $lastpage) {
        echo " > LAST ";
    } else {
        $nextpage = $pageno+1;
        echo " <strong><a href='{$_SERVER['PHP_SELF']}?pageno=$nextpage'>></a></strong> ";
        echo " <strong><a href='{$_SERVER['PHP_SELF']}?pageno=$lastpage'>LAST</a></strong> ";
    }
    echo "</div>";
    ?>
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

function del(index){
  if (confirm("Are you sure you want to delete?")) {
    let form = '<form action="delete.php" method="post" id="editform">' +
    '<input type="text" name="file" value="'+ index + '" />' +
      '</form>'
    $('body').append(form)
    $('#editform').submit()
  }
}

function ed(index) {
  let form = '<form action="edit.php" method="post" id="editform">' +
  '<input type="text" name="file" value="'+ index + '" />' +
    '</form>'
  $('body').append(form)
  $('#editform').submit()
}
</script>

</html>
