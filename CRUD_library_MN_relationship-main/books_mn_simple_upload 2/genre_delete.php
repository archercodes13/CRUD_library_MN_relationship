<?php
require "db.php";
require "functions.php";
$id = $_GET["id"];
deleteGenre($sql, $id);
header("Location: genres.php");
?>
