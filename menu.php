<?php 
    
?>
<div class="menu">
    <div class="m-title">
        <h3>TaskSystem.</h3>
    </div>
    <div class="profile">
        <span class="dep">User Name</span>
        <h5 class="name"><?php echo $_SESSION['username']; ?></h5>
    </div>
    <ul>
        <li><a href="dashboard.php"><i class="bi bi-speedometer"></i> Dashboard</a></li>
        <!-- <li><a href="">Profile</a></li> -->
        <li><a href="tasks.php"><i class="bi bi-list-task"></i> All tasks</a></li>
        <li><a href="index.php"><i class="bi bi-box-arrow-left"></i> Log out</a></li>
    </ul>
</div>