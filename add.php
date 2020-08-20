<?php

require_once('config.php');

if($_POST){

    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = $pdo->prepare('INSERT INTO `todo_list`(`title`,`description`)VALUES(:title, :description); ');
    $result = $sql->execute(
        array(
            ':title' => $title,
            ':description' => $description
        )
    );

    if($result){
        echo "<script>alert('New Task Added');window.location.href='index.php';</script>";
    }

}   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <h1>Add Task</h1>
        <div class="row">
            <div class="col-md-8">
                <form action="add.php" method="POST">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" placeholder="Enter Description">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>