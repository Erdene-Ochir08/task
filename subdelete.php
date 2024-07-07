<?php
    session_start();
    include 'config.php';
    if(isset($_GET['subdeleteid'])){
        $sub_id = $_SESSION["sub_task_id"];
        $id=$_GET['subdeleteid'];
        $delete_sql = "DELETE FROM subtasks where subtask_id=$id";
        $result = mysqli_query($conn, $delete_sql);
        if($result){
            // echo "Successfully deleted";
            header("location:subtasks.php?taskid=$sub_id");
        }else{
            die(mysqli_error($conn));
        }
    }
?>