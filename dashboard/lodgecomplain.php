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
                        <h1 class="mt-4">Complain Here </h1>
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Complain Form</li>
                        </ol>
                        <?php 
                            include "../model/model.php";
                            $model = new Model();
                            $model->lodgecomplain();
                        ?>
                        <form method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group row">
                            <label  class="col-sm-4 col-form-label">Organization You Are Complaining About</label>
                            <div class="col-sm-8">
                            <input type="text"  class="form-control" name='organizationname' placeholder='Please state the business name or company name here' required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Contact Address</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="organizationcontact" placeholder="You can enter phone number, email or address here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Complain</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name='complain'  placeholder="Let them know what happened here ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">How Can They Improve Their Service</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="howtoimprove" placeholder="Tell them what you want them to do to be better.">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Will You Consider Using Their Service Or Product In The Future.</label>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="secondchance" id="inlineRadio1" value="yes" required> 
                                    <label class="form-check-label" for="inlineRadio1">Yes, I will</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="secondchance" id="inlineRadio2" value="no">
                                    <label class="form-check-label" for="inlineRadio2">No, I won't</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Do you want to lodge this complain anonymously?</label>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="anonymous" id="inlineRadio1" value="yes" required>
                                    <label class="form-check-label" for="inlineRadio1">I want to be anonymous</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="anonymous" id="inlineRadio2" value="no">
                                    <label class="form-check-label" for="inlineRadio2">Let them know it is me. Show My UserName</label>
                                </div>
                                     
 
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                            <input type="hidden" class="form-control" name="username" value="<?php echo $_SESSION['username'] ?>" required>
                            </div>
                             <div class="col-sm-8">
                            <button type='submit' class='btn-lg btn btn-danger' name='lodgecomplain'>Lodge Complain</button>
                            </div>
                        </div>
                        </form>
                         
                         
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
