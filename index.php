<?php
    require_once('config.php');

    $sql = $pdo->prepare("SELECT * FROM todo_list");
    $sql->execute();
    $tasks = $sql->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h1>Todo List</h1>
            <div>
                <a href="add.php" class="btn btn-primary" type="button">Add Task </a>
            </div>
            <br>
            <table class="table table-striped">
                <?php 
                    $i=1;
                    if($tasks){
                        echo "<tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>";
                    foreach($tasks as $task){ ?>
                
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $task->title ?></td>
                    <td><?php echo $task->description ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $task->id ?>" type="button" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?php echo $task->id ?>" type="button" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php 
                        }
                    }else{
                        echo "<p>No Task</p>";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>