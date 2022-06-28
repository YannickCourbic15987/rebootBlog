<?php
session_start();
session_unset();
session_destroy();

header('location:http://localhost/rebootBlog--v2/connect.php?success=1&deco=1');
exit();
