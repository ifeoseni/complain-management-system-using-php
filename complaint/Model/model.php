<?php

Class Model{
    private $server = "localhost";
    private $username = "root";
    private $password;
    private $db = "complaint";
    protected $conn;

    public function __construct(){
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "Connection failed" . $e->getMessage();
        }
    }

    public function countOthersComplain($table,$username){
        $query = "SELECT * FROM $table WHERE username != '$username' ";
        $sql = $this->conn->query($query)->num_rows;
        return $sql;
    }

    public function countYourComplain($table,$username){
        $query = "SELECT * FROM $table WHERE username = '$username' ";
        $sql = $this->conn->query($query)->num_rows;
        return $sql;
    }

     

    public function check_details(){
        if(isset($_POST['login'])){
            if(isset($_POST['username'])  && isset($_POST['password']) ){
                
                if(!empty($_POST['username'])  &&  !empty($_POST['password']) ){
                    
                    $name = $_POST['username'];                    
                    $pass = md5($_POST['password']);                     
                    
                    $check = "SELECT * FROM users WHERE (username = '$name' || email='$name') AND passcode='$pass'";
                    $data = null;

                    if ($this->conn->query($check)->num_rows  == 1){
                        $checkuser = "SELECT * FROM users WHERE (username = '$name' || email='$name') AND passcode='$pass'";
                        $row = $this->conn->query($check)->fetch_assoc() ;
                           $_SESSION['username'] = $row['username'];  
                            //$_SESSION['username'] = $row['username'];
                           $_SESSION['email'] = $row['email'];
                           //echo $row['email'];
                           //print_r($row);
                        //    header("location: home.php");

                        
                        
                        //return $data;
                        //echo $_SESSION['email'];
                        echo "<script>alert('Login Succesful. ')</script>";
                        echo "<script>window.location.href = 'dashboard/index.php';</script>";
                    }else{
                        echo "<script>alert('Username does not exist or password is wrong. Try again.')</script>";
                        //echo "<script>window.location.href = 'registration.php';</script>";
                    }  
                    
                }else{
                    echo "<script>alert('Username / Password needs to be inputted.')</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                
                }
            }
        }
    }

    public function insert(){
        if(isset($_POST['createaccount'])){
            if(isset($_POST['lname']) && isset($_POST['fname']) && isset($_POST['username'])&& isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['cpassword']) ){
                
                if(!empty($_POST['lname'])   && !empty($_POST['fname']) && !empty($_POST['username'])  && !empty($_POST['phone'])  && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cpassword'])
                 && !empty($_POST['cpassword']) ){
                    
                    $surname = $_POST['lname'];
                    $fname = $_POST['fname'];
                    $mname = $_POST['mname'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];
                    $cpassword = $_POST['cpassword'];
                    

                    if($password !== $cpassword){
                        echo "<script>alert('Password do not match')</script>";
                            echo "<script>window.location.href = 'register.php';</script>";
                    }else{
                        $check = "SELECT username,email FROM users WHERE username = '$username' || email='$email'";
                        $insertpassword = md5($password);
                        if ($this->conn->query($check)->num_rows < 1){
                            $query = "INSERT INTO users (surname, 	fname, 	mname, 	username, 	email, 	phone, 	passcode 	) VALUES 
                            ('$surname','$fname','$mname','$username','$email',
                            '$phone','$insertpassword')";
                            if ($sql = $this->conn->query($query)) {
                                $_SESSION['username'] = $username;
                                $_SESSION['email'] = $email;

                                echo "<script>alert('You just created your account successfully.')</script>";
                                echo "<script>window.location.href = 'dashboard/index.php';</script>";
                            } else {
                                echo "<script>alert('We could not create your account at the moment.')</script>";
                            }
                        }else{
                            echo "<script>alert('Please change your username or login if you have created an account already')</script>";
                            //echo "<script>window.location.href = 'registration.php';</script>";
                        }
                            
    
                        
                    }


                                             
                    
                    
                }else{
                    echo "<script>alert('empty')</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                
                }
            }
        }
    }

    public function lodgecomplain(){
        if(isset($_POST['lodgecomplain'])){
                  
            $organizationname = $_POST['organizationname'];
            $organizationcontact = $_POST['organizationcontact'];
            $howtoimprove = $_POST['howtoimprove'];
            $secondchance = $_POST['secondchance'];
            $anonymous = $_POST['anonymous'];
            $username = $_POST['username'];
            $complain = $_POST['complain'];

            $check = "SELECT * FROM lodgedcomplains WHERE username = '$username' AND complain='$complain'";
        
            if ($this->conn->query($check)->num_rows < 1){
                $query = "INSERT INTO lodgedcomplains (organizationname, organizationcontact, complain, 
                howtoimprove, secondchance,anonymous,username )      VALUES 
                ('$organizationname','$organizationcontact','$complain',  '$howtoimprove','$secondchance',  '$anonymous','$username')"; 
                if ($sql = $this->conn->query($query)) {
                    echo "<script>alert('You just lodged a complain successfully.')</script>";
                    echo "<script>window.location.href = 'lodgecomplain.php';</script>";
                } else {
                    echo "<script>alert('We could not create your account at the moment.')</script>";
                }
            }else{
                echo "<script>alert('Please change your username or login if you have created an account already')</script>";
                //echo "<script>window.location.href = 'registration.php';</script>";
            }
           
        }
    }

    public function fetch($table){
        $data = null;

        $query = "SELECT * FROM $table ";
        if($sql = $this->conn->query($query)){
            while ($row = mysqli_fetch_assoc($sql)  ) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function fetchrecords($table,$id){
        $data = null;

        $query = "SELECT * FROM $table WHERE username = '$id' ";
        if($sql = $this->conn->query($query)){
            while ($row = mysqli_fetch_assoc($sql)  ) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function fetchotherrecords($table,$id){
        $data = null;

        $query = "SELECT * FROM $table WHERE username != '$id' ";
        if($sql = $this->conn->query($query)){
            while ($row = mysqli_fetch_assoc($sql)  ) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function fetchwhere($table,$id){
        $data = null;

        $query = "SELECT * FROM $table WHERE  username = '$id'"; //email = '$id' ||
        if($sql = $this->conn->query($query)){
            while ($row = mysqli_fetch_assoc($sql)  ) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function delete($table, $id){
        echo $id;
        $query = "DELETE FROM $table WHERE id = '$id'";
        if($sql = $this->conn->query($query) ){
            echo "<script>alert('Delete Operation Successful.')</script>";            
            echo "<script>window.location.href = 'yourcomplain.php';</script>";
             
        }else{
            echo "<script>alert('We could not perform that operation at the moment.')</script>";               
            echo "<script>window.location.href = 'yourcomplain.php';</script>";
            return false;
        }
    }

    public function fetch_single($table,$id){
        $data = null;
        $query = "SELECT * FROM $table WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
             while($row = $sql->fetch_assoc()){
               $data = $row;  
             }
        }
        return $data;
    }

    public function fetch_singlerecord($where){
        $data = null;
        $query = "SELECT * FROM users WHERE $where";
        if ($sql = $this->conn->query($query)) {
             while($row = $sql->fetch_assoc()){
               $data = $row;  
             }
        }
        return $data;
    }

    public function update($table,$id){
        if(isset($_POST['updatecomplaint'])){
            $organizationname = $_POST['organizationname'];
            $organizationcontact = $_POST['organizationcontact'];
            $howtoimprove = $_POST['howtoimprove'];
            $secondchance = $_POST['secondchance'];
            $anonymous = $_POST['anonymous'];
            $username = $_POST['username'];
            $complain = $_POST['complain'];

            $update = "UPDATE $table SET organizationname = '$organizationname', organizationcontact = '$organizationcontact',	complain = '$complain',	howtoimprove ='$howtoimprove',
            	secondchance ='$secondchance',	anonymous ='$anonymous' 	 WHERE id='$id' AND username='$username' ";
            if($sql = $this->conn->query($update)){
                echo "<script>alert('You just updated the complain you made.')</script>";
                echo "<script>window.location.href = 'yourcomplain.php';</script>";
            } else {
                echo "<script>alert('We could not update your complain at the moment. Try again later')</script>";
                echo "<script>window.location.href = 'yourcomplain.php';</script>";
            }
            
   
        }
    }
          

}

?>