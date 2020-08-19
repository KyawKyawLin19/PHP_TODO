<?php
    require_once('config.php');

    if($_POST){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $sql = $pdo->prepare("UPDATE todo_list SET title='$title',description='$description' WHERE id='$id';");
        $result = $sql->execute();

        if($result){
            echo "<script>alert('Updated');window.location.herf='index.php';</script>";
        }

    }else{
        $sql = $pdo->prepare("SELECT * FROM todo_list WHERE id=".$_GET['id']);
        $sql->execute();
        $task = $sql->fetch(PDO::FETCH_OBJ);
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
        <h1>Update Task</h1>
        <div class="row">
            <div class="col-md-8">
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $task->id; ?>">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $task->title; ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" value="<?php echo $task->description; ?>">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update">
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>