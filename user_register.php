<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shopkeeper Registeration</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script language="javascript">
function check()
{

 if(document.form1.lid.value=="")
  {
    alert("Plese Enter Login Id");
	document.form1.lid.focus();
	return false;

  }
 
 if(document.form1.pass.value=="")
  {
    alert("Plese Enter Your Password");
	document.form1.pass.focus();
	return false;
  } 
  if(document.form1.cpass.value=="")
  {
    alert("Plese Enter Confirm Password");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.pass.value!=document.form1.cpass.value)
  {
    alert("Confirm Password does not matched");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.name.value=="")
  {
    alert("Plese Enter Your Name");
	document.form1.name.focus();
	return false;
  }
  if(document.form1.address.value=="")
  {
    alert("Plese Enter Address");
	document.form1.address.focus();
	return false;
  }
  if(document.form1.city.value=="")
  {
    alert("Plese Enter City Name");
	document.form1.city.focus();
	return false;
  }
  if(document.form1.phone.value=="")
  {
    alert("Plese Enter Contact No");
	document.form1.phone.focus();
	return false;
  }
  if(document.form1.email.value=="")
  {
    alert("Plese Enter your Email Address");
	document.form1.email.focus();
	return false;
  }
  e=document.form1.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');
		e2=e.indexOf('.',e1+1);
		n=e.length;

		if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
		{
			alert("Please Enter valid Email");
			document.form1.email.focus();
			return false;
		}
  return true;
  }
  
</script>

</head>
<body class="bg-light">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form action="user_register.php" method="post">
          
            <div class="form-label-group">
              <input type="text" id="Name" class="form-control" placeholder=" Name" required="required" autofocus="autofocus" name="name">
              <label for="Name"> Name</label>
            </div>
                <br>
          
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" name="email">
              <label for="inputEmail">Email </label>
            </div>
          
                 <br>
        
           <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
              <label for="inputPassword">Password</label>
           </div>
          
                <br>
          
          <div class="form-label-group">
            <input type="tel" id="mobileNo" class="form-control" placeholder="Mobile Number" required="required" name="mobile">
            <label for="mobileNo">Mobile Number</label>
          </div>
                
                 <br>
                 <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block"  name="register">Register</button>
        <a class="d-block small mt-3" href="shop_login.php">Login Page</a>
        <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
                 <?php
    include "user_includes/db.php";
     if(isset($_POST['register']))
     {
      //echo "success";
      
     $shop_name =$_POST['name'];
     $shop_email=$_POST['email'];
      $shop_password=$_POST['password'];
      $shop_mobile_no=$_POST['mobile'];


      $query_check = "SELECT * FROM customer_registeration WHERE c_mobile_no = '$shop_mobile_no' || c_email='$shop_email '|| c_password='$shop_password' ";
      $result_check = mysqli_query($connection,$query_check);
      if($result_check)
      {
        //echo "success";
        $count = mysqli_num_rows($result_check);
        if($count)
        {
          echo "<script>alert('Account Already Exsist , please usee another account number');</script>";
        }
        else
        {
         $query_insert ="INSERT INTO customer_registeration(c_name,c_email,c_password,c_mobile_no) VALUES('$shop_name','$shop_email','$shop_password','$shop_mobile_no')";
         $insert_result = mysqli_query($connection,$query_insert);
         if($insert_result)
        {
          echo"<script>alert('data inserted successfully')</script>";
           echo "data added";

         
         }
         else
         {
             die("query wrong!!");
         }        
        }
      }
      else
      {
        echo "Error in Query ".mysqli_error($connection); 

      }
      

     
     
    }
        
  ?>  
        </form>
          
       

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  

</body>

</html>