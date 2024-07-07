<?php 
    session_start();
    include 'config.php';

    if(!isset($_SESSION['username'])){
        header('location:index.php');
    }
    $user_id = $_SESSION['user_id'];

    echo $user_id;
    // 1. query
    $select_sql = "SELECT * FROM tasks WHERE user_id = '$user_id'";
    // 2. result
    $select_result = mysqli_query($conn, $select_sql);
    // 3. html ruu change
    $task = mysqli_fetch_all($select_result, MYSQLI_ASSOC);
    $i=1;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $insert_sql = "INSERT INTO tasks (task_id,user_id,task_name,task_description) VALUES 
        (NULL,'$user_id','$title','$description')";
        // result
        $result = mysqli_query($conn,$insert_sql);
        if($result){
            echo "Teacher successfully inserted";
            header('location:tasks.php');
        }else{
            die(mysqli_error($conn));
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All tasks</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <div class="dash">
            <div class="row">
                <div class="col-md-3">
                    <?php include('menu.php')?>
                </div>
                <div class="col-md-9">
                    <div class="content">
                        <!-- <div class="row">
                            <a href="add_task.php">
                                <button type="button" class="btn btn-primary">
                                    Add Task
                                </button>
                            </a>
                        </div> -->
                        <div class="row text">
                            <form method="POST" action="tasks.php" style="height:10px;">
                                <input type="text" name="title" placeholder="Task Title" required class="form-control mb-3">
                                <textarea name="description" placeholder="Task Description" class="form-control mb-3"></textarea>
                                <button type="submit" name="task" class="btn btn-primary">Add Task</button>
                            </form>
                            <table class="teacher">
                                <tr>
                                    <th>task ID</th>
                                    <th>task name</th>
                                    <th>task description</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($task as $t){ ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $t['task_name'] ?></td>
                                    <td><?php echo $t['task_description'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary">
                                            <a href="subtasks.php?taskid=<?= $t['task_id'] ?>">Show</a>
                                        </button>
                                        <button type="button" class="btn btn-primary">
                                           <a href="edit.php?editid=<?php echo $t['task_id'] ?>">Edit</a>
                                        </button>
                                        <button type="button" class="btn btn-danger">
                                            <a href="delete.php?deleteid=<?php echo $t['task_id'] ?>">Delete</a>
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>