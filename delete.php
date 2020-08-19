<?php
    require_once('config.php');
    $sql = $pdo->prepare("DELETE FROM todo_list WHERE id=".$_GET['id']);
    $sql->execute();

    header("Location: index.php");
?>