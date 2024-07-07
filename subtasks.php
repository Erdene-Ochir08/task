<?php 
    session_start();
    include 'config.php';

    if(!isset($_SESSION['username'])){
        header('location:index.php');
    }
    $id=$_GET['taskid'];
    $_SESSION["sub_task_id"] = $id;
    echo $id;
    // 1. query
    $select_sql = "SELECT * FROM subtasks WHERE task_id = '$id'";
    // 2. result
    $select_result = mysqli_query($conn, $select_sql);
    // 3. html ruu change
    $task = mysqli_fetch_all($select_result, MYSQLI_ASSOC);
    $i=1;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sub_title = $_POST['sub_title'];
        $sub_description = $_POST['sub_description'];
        
        $insert_sql = "INSERT INTO subtasks (subtask_id,task_id,subtask_title,subtask_description) VALUES 
        (NULL,'$id','$sub_title','$sub_description')";
        // result
        $result = mysqli_query($conn,$insert_sql);
        if($result){
            echo "Teacher successfully inserted";
            header("location:subtasks.php?taskid=$id");
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
                            <form method="POST" style="height:80px;">
                                <input type="text" name="sub_title" placeholder="Task Title" required class="form-control mb-3">
                                <textarea name="sub_description" placeholder="Task Description" class="form-control mb-3"></textarea>
                                <button type="submit" name="task" class="btn btn-primary">Add Task</button>
                            </form>
                            <table class="teacher">
                                <tr>
                                    <th>sub task ID</th>
                                    <th>sub task name</th>
                                    <th>sub task description</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($task as $t){ ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $t['subtask_title'] ?></td>
                                    <td><?php echo $t['subtask_description'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary">
                                           <a href="subedit.php?subeditid=<?php echo $t['subtask_id'] ?>">Edit</a>
                                        </button>
                                        <button type="button" class="btn btn-danger">
                                            <a href="subdelete.php?subdeleteid=<?php echo $t['subtask_id'] ?>">Delete</a>
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