<?php
require "db.php";
require "functions.php";
$id = $_GET["id"];
$author = getAuthor($sql, $id);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $photo = $author["photo"];

    if($_FILES["photo"]["name"] != "") {
        $photo = $_FILES["photo"]["name"];
        move_uploaded_file($_FILES["photo"]["tmp_name"], "uploads/" . $photo);
        $photo = "uploads/" . $photo;
    }

    editAuthor($sql, $id, $_POST["name"], $_POST["bio"], $photo);
    header("Location: authors.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Author</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page">
    <?php require "header.php"; ?>
    <h1>Edit Author</h1>

    <form method="post" enctype="multipart/form-data">
        <label>Name</label>
        <input type="text" name="name" value="<?= $author["name"] ?>">

        <label>Bio</label>
        <textarea name="bio"><?= $author["bio"] ?></textarea>

        <label>New photo</label>
        <input type="file" name="photo">

        <button>Save</button>
    </form>
</div>
</body>
</html>
