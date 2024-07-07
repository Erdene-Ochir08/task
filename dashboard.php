<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Dashboard</h5>
                            </div>
                            <!-- <div class="col-md-3">
                                <div class="number">
                                    <p>Employee's number : 20</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="number">
                                    <p>Departent's number : 8</p>
                                </div>
                            </div> -->
                        </div>
                        <div class="row text">
                            <div class="col-md-12">
                                <img src="image/bg.jpg" class="diagram">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>