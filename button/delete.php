
<?php
require '../src/pdo.php';
if (isset($_POST['ID_ARTICLE'])) {
    $ID = $_POST['ID_ARTICLE'];
    $req2 = $pdo->prepare('select  * from article where ID_ARTICLE = ?');
    $req2->execute([$ID]);
    $data = $req2->fetch();
    unlink('.' . $data['scr_img']);
    $req = $pdo->prepare('delete from article where ID_ARTICLE = ? ');
    $req->execute([$ID]);
    header('location:http://localhost/rebootBlog--v2/article.php?success=1&delete=1');
    exit();
}
