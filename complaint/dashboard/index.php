<?php
session_start();
if(!isset($_SESSION['username']) || !isset($_SESSION['email']) ){
    echo "<script>alert('Please login to access the dashboard')</script>";            
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include "navbar.php"; ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include "sidebar.php"; ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Home Page </h1>
                        <?php

                            include "../model/model.php";
                            $model = new Model();

                        ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Complaint Others Have Made</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h4><?php echo $model->countOthersComplain("lodgedcomplains",$_SESSION['username']); ?></h4>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Complaint You Made</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h4><?php echo $model->countYourComplain("lodgedcomplains",$_SESSION['username']); ?></h4> 
                                    </div>
                                </div>
                            </div>
                         
                             
                        </div>
                         
                         
                    </div>
                </main>
                <?php include "footer.php"; ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
