<?php session_start() ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pw = $_POST["password"];
}

echo $pw;

if ($pw == "genfakes"){
  $_SESSION['auth']="authorised";
  header('Location: index.php');
} else {
  $_SESSION['login_failed'] = "Incorrect Password";
  header('Location: login.php');
};
?>
