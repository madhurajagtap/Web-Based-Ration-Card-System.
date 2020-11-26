<?php 
  include "user_includes/db.php" ;
?>
 <?php
  //  ob_start();
?> 

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <title>Customer Registeration</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
 


  <!-- <script  type="text/javascript" src="reg.js"></script> -->
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-sm my-5">
      <div class="card-body ">
        <!-- Nested Row within Card Body -->
        
          <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
          <div class=<div class="row col-lg-7"> 
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 sm-4">Create an Account!</h1>
              </div>
              <form name="form" class="user" method="post" action="register.php"  onsubmit="return check()" >
                <div class="form-group ">
                  
                    <input type="text" name="c_name" class="form-control form-control-user" id="c_name" placeholder=" Name" required="required">
                  </div>
                
                   <div class="form-group">
                  <input type="email" name="c_email" class="form-control form-control-user" id="c_email" placeholder="Email Address" required="required">
                </div>
                <div class="form-group">
                  <input type="tel" name="mobile_number" class="form-control form-control-user" id="mobile_number" placeholder="Mobile Number" required="required">
                </div>
               
                <div class="form-group">
                  <input type="text" name="Aadhar_number" class="form-control form-control-user" id="Aadhar_number" placeholder="Aadhar Card Number" required="required">
                </div>
                <div class="form-group">
                  <input type="text" name="ration_number" class="form-control form-control-user" id="ration_number" placeholder="Ration Card Number" required="required">
                </div>
                 <div class="form-group">
                  <input type="text" name="city" class="form-control form-control-user" id="exampleInputLocation" placeholder="City">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="c_password" class="form-control form-control-user" id="c_password" placeholder="Password" required="required">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="repeat_password" class="form-control form-control-user" id="repeat_password" placeholder="Repeat Password" required="required">
                  </div>
                </div>
                <input type="submit" value="Register Account" name="register" class="btn btn-primary btn-user btn-block" >
                
                
                <hr>
                
              </form>
              <?php 
              //  session_start();
              //  $id = $_GET['customer_id'];
           
              if(isset($_POST['register']))
              {

                //echo"success";
                  $user_Name=trim($_POST['c_name']);
                  $user_Email=trim($_POST['c_email']);
                  $user_Password=trim($_POST['c_password']);
                  $repeat_Password=trim($_POST['repeat_password']);
                  $mobile=trim($_POST['mobile_number']);
                  $aadhar=trim($_POST['Aadhar_number']);
                  $ration=trim($_POST['ration_number']);
                  $city=trim($_POST['city']);
               

                  
                
                  
                  $query_check = "SELECT * FROM customer_registeration WHERE c_mobile_no = '$mobile' || c_email='$user_Email '|| c_password='$user_Password' || aadhar_number='$aadhar' || ration_number='$ration'";
                  $result_check = mysqli_query($connection,$query_check);
                  if($result_check)
                  {
                    //echo "success";
                    $count = mysqli_num_rows($result_check);
                    if($count)
                    {
                      echo "<script>alert('Account Already Exsist, Please Use Another Account Number');</script>";
                    } 
                    else
                    {
                      if($user_Password!=$repeat_Password)
                      {
                        
                        echo"<script> alert('Passwords Do Not Match');</script>";
                    
                      }
                    
                       else if(strlen($mobile)!=10)
                    {
                     echo"<script> alert('Invalid Mobile Number');</script>";
                    }
                    else if(strlen($aadhar)!=12)
                    {
                      echo"<script> alert('Invalid Aadhar Card Number');</script>";
                    }
                    else if(strlen($ration)!=12)
                    {
                      echo"<script> alert('Invalid Ration Number');</script>";
                    }
                    else
                    {

                       $query_insert ="INSERT INTO customer_registeration(c_name,c_email,c_password,c_mobile_no,aadhar_number,ration_number,c_city) VALUES('$user_Name','$user_Email','$user_Password','$mobile','$aadhar','$ration','$city')";
                     $insert_result = mysqli_query($connection,$query_insert);
                     if($insert_result)
                    {
                      echo"<script>alert('Account Created Successfully!')</script>";
                      //  echo "data added";
            
                     
                     }
                     else
                     {
                         die("query wrong!!");
                     }        
                    }
                    }
                
                }
            
                 
                 
                }
                    


              
            ?>
                
              <hr>
              <!-- <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div> -->
              <div class="text-center large">
              Already have an account?
                <a  href="user_login.php"> Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
