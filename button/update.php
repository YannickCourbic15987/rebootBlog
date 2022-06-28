<?php
var_dump($_POST);
session_start();
$_SESSION['mod'] = 1;
$_SESSION['ID_ARTICLE'] = $_POST['ID_ARTICLE'];
header('location:http://localhost/rebootBlog--v2/article.php');
exit();
