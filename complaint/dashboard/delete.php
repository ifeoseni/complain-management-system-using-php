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
        <style>
            .form-group{
                margin:10px;
            }
        </style>
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
                        <h1 class="mt-4">Deleting Your Complaint </h1>
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">This action is irrevokable</li>
                        </ol>
                        <?php 
                            include "../model/model.php";
                            $model = new Model(); 
                            $id = $_GET["id"];
                            $rows = $model->delete("lodgedcomplains",$id);
                        ?>
                            
                            
                         
                         
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
