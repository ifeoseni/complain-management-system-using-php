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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                        <h1 class="mt-4">See Your Complaint Here </h1>
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">See Your Complain</li>
                        </ol>
                        <?php 
                            include "../model/model.php";
                            $model = new Model(); 
                            $id = $_SESSION["username"];
                            $rows = $model->fetchrecords("lodgedcomplains",$id);
                            
                            $i=1;
                           
                            if(!empty($rows)){
                                foreach($rows as $row){
                        ?>
                      
                            <div class="card bg-dark mt-2 mb-2">
                                <div class="card-header text-white ">
                                    Complain Number <?php echo $i; $i++; ?>
                                </div>

                                <div class="card-body bg-danger text-white">
                                <p>Organization Name: <?php echo $row['organizationname']; ?></p>
                                <p>Organization Contact: <?php echo $row['organizationcontact']; ?></p>
                                <p>Your Complain: <?php echo $row['complain']; ?></p>
                                <p>Your Suggestion: <?php echo $row['howtoimprove']; ?></p>
                                <p>Will You Use Them Again:  <?php echo $row['secondchance']; ?></p>
                                <p>Do You Want Them To Know You Lodged The Complain? <?php echo $row['anonymous']; ?></p>
                                <p>Date Complain Was Lodged: <?php echo $row['datelodged']; ?></p>
                                </div>
                                
                                <div class="card-footer bg-dark text-white text-right text-center float-right">
                                <button type="button" class="btn btn-danger"><a href='delete.php?id=<?php echo $row["id"]; ?>' onclick='return confirm("Are you sure you want to delete this complain?")' id='delete' style='text-decoration:none;'  class='text-white'> Delete This Complain</a></button>
             
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#"><a href='update.php?id=<?php echo $row["id"]; ?>' target="_blank" class=' text-white' style='text-decoration:none;'  >Edit Complain</a></button>
                                </div>

                            </div>
                            <?php
                                }
                            }else{
                                    echo "<h3 class='You Have Not Lodged Any Complain'>No data</h4>";
                                }
                            ?>
                         
                         
                    </div>
                </main>

                <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" id='myModal'>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         

      <form method='POST' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group row">
                            <p>Organization You Are Complaining About</p>
                            <div class="col-sm-12">
                            <input type="text"  class="form-control" name='organizationname' value='<?php echo $row['organizationname']; ?>' required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <p>Contact Address</p>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" name="organizationcontact" placeholder="You can enter phone number, email or address here">
                            </div>
                        </div>
                        <div class="form-group row">
                            <p>Complain</p>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" name='complain'  placeholder="Let them know what happened here ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <p>How Can They Improve Their Service</p>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" name="howtoimprove" placeholder="Tell them what you want them to do to be better.">
                            </div>
                        </div>
                        <div class="form-group row">
                            <p>Will You Consider Using Their Service Or Product In The Future.</p>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="secondchance" id="inlineRadio1" value="Yes" required> 
                                    <label class="form-check-label" for="inlineRadio1">Yes, I will</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="secondchance" id="inlineRadio2" value="No">
                                    <label class="form-check-label" for="inlineRadio2">No, I won't</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <p>Do you want to lodge this complain anonymously?</p>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="anonymous" id="inlineRadio1" value="Yes" required>
                                    <label class="form-check-label" for="inlineRadio1">I want to be anonymous</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="anonymous" id="inlineRadio2" value="No">
                                    <label class="form-check-label" for="inlineRadio2">Let them know it is me. Show My UserName</label>
                                </div>
                                     
 
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                            <input type="hidden" class="form-control" name="username" value="<?php echo $_SESSION['username'] ?>" required>
                            </div>
                             <div class="col-sm-8">
                             
                            </div>
                        </div>
                        </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
 







                <?php include "footer.php"; ?>
            </div>
        </div> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
        <script>
</script>
    </body>
</html>
