<?php
    include 'config.php';
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];
        $delete_sql = "DELETE FROM tasks where task_id=$id";
        $result = mysqli_query($conn, $delete_sql);
        if($result){
            // echo "Successfully deleted";
            header('location:tasks.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>