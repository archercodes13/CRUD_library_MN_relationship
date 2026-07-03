<?php
require "db.php";
require "functions.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $photo = $_FILES["photo"]["name"];

    if($photo != "") {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $photo);
        $photo = "uploads/" . $photo;
    }

    addAuthor($sql, $_POST["name"], $_POST["bio"], $photo);
    header("Location: authors.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Author</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>
    <h1>Add Author</h1>

    <form method="post" enctype="multipart/form-data">
        <label>Name</label>
        <input type="text" name="name">

        <label>Bio</label>
        <textarea name="bio"></textarea>

        <label>Photo</label>
        <input type="file" name="photo">

        <button>Add</button>
    </form>
</div>
</body>
</html>
