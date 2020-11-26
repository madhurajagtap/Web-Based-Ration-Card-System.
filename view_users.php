<?php include "user_includes/header.php" ;?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div> -->

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-lg-12 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      <b>
                      User Details
                      </b></div>
                      <br>
                      <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal1">
                          Add Customer
                      </button> -->

      <div class="modal" id="mymodal1">
       <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                     <h3 class="modal-title">Add User Details</h3> 
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body"> 


                <form action="" method="post">


                <div class="form-group ">
                  
                    <input type="text" name="c_name" class="form-control form-control-user" id="exampleFirstName" placeholder=" Name">
                  </div>
                  <div class="form-group ">
                  
                    <input type="text" name="c_city" class="form-control form-control-user" id="exampleFirstName" placeholder=" City">
                  </div>
                  <div class="form-group ">
                  
                  <input type="tel" name="c_contact" class="form-control form-control-user" id="exampleFirstName" placeholder=" Contact Number">
                </div>
                <div class="form-group ">
                  
                  <input type="email" name="c_email" class="form-control form-control-user" id="exampleFirstName" placeholder=" Email Id">
                </div>
              
                <div class="form-group ">
                  
                  <input type="Password" name="c_password" class="form-control form-control-user" id="exampleFirstName" placeholder="Password">
                </div>
              
 

                
                
                </div>
                <div class="modal-footer">
                    <!-- <button type="submit"  name="register" class="btn btn-primary" >
                        click here
                    </button> -->
                    <input type="submit" name="adduser" class="btn btn-primary">
                    <?php
                    if(isset($_POST['adduser']))
                    {
                     echo "success";
                    
                    $customer_name =$_POST['c_name'];
                    $customer_city=$_POST['c_city'];
                     $customer_contact=$_POST['c_contact'];
                     $email =$_POST['c_email'];
                     $password=$_POST['c_password'];
                    
                     
            $query_insert ="INSERT INTO customer_registeration(c_name,c_email,c_password,c_mobile_no,c_city) VALUES('$customer_name','$email','$password','$customer_contact','$customer_city')";
                        $insert_result = mysqli_query($connection,$query_insert);
                        
                        if($insert_result)
                       {
                         // echo"<script>alert('data inserted successfully')</script>";
                          echo "data added";
                          
                        
                        }
                        else
                        {
                            echo "error".mysqli_error($connection);
                        }        
                       
                     
                     
                    
                   }
                       
                 ?> 
                    </form>

                
                </div>
            </div>
</div>
</div>
       


    <br>
            <br>
            <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            <thead>
            <tr>
                        <th>
                            Sr No
                        </th>

                        <th>
                             Name
                        </th>
                        <th>
                            Email
                        </th>
                        
                        <th>
                             City 
                        </th>
                        <th>
                            Contact Number
                        </th>
                        <th>
                            Product Details
                        </th>
                        <th>
                            Edit
                        </th>
                        <th>
                            Delete
                        </th>
                    </tr>

            </thead>

            <tfoot>
            <tr>
                        <th>
                            Sr No
                        </th>

                        <th>
                             Name
                        </th>
                        <th>
                            Email
                        </th>
                        
                        <th>
                             City 
                        </th>
                        <th>
                             Contact Number
                        </th>
                        <th>
                            Product Details 
                        </th>
                        <th>
                            Edit
                        </th>
                        <th>
                            Delete
                        </th>
                    </tr>

            </tfoot>
            <tbody>
                    <?php

                    $query  = "SELECT * FROM customer_registeration";
                    $result = mysqli_query($connection,$query);

                    if($result)
                    {
                        $i=1;
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $id = $row['customer_id'];
                            $name=$row['c_name'];
                            $city=$row['c_city'];
                            $mobile=$row['c_mobile_no'];
                            $email=$row['c_email'];
                            $password=$row['c_password'];
                    ?>
                        <tr>
                            <td>
                            <?php echo $i  ?>
                            </td>
                            <td>
                                <?php echo $name  ?>
                            </td>
                            <td>
                                <?php echo $email  ?>
                            </td>
                           
                            <td>
                                <?php echo $city  ?>
                            </td><td>
                                <?php echo $mobile  ?>
                            </td><td>
                            <a class="btn btn-warning text-light" href="view_user_product_details.php?emp_id=<?php echo $id;?>" >
                                View
                                </a> 
                            </td>  
                            <td>
                                    <!-- Button trigger modal -->
<!-- edit -->


<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $id; ?> ">
  EDIT
</button>

                                      <!-- Edit Modal -->
<div class="modal" id="exampleModal<?php echo $id; ?>">
<div class="modal-dialog">
<div class="modal-content">
         <div class="modal-header">
                    <h3 class="modal-title">Add Customer Details</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
         <div class="modal-body"> 

       <form action="" method="post">
         <div class="form-group ">
         <input type="text" hidden name="s_id" value="<?php echo $id; ?>" id="">
             <input type="text"  name="c_name" value="<?php echo $name;?>" class="form-control form-control-user"  placeholder="Name">
         </div>

          <div class="form-group ">
              <input type="text" hidden name="s_id" value="<?php echo $id; ?>" id="">
              <input type="tel"  name="c_mobile_no" value="<?php echo $mobile; ?>" class="form-control form-control-user"  placeholder="Contact Number">
           </div>
           <div class="form-group ">
              <input type="text" hidden name="s_id" value="<?php echo $id; ?>" id="">
              <input type="text"  name="c_city" value="<?php echo $city; ?>" class="form-control form-control-user"  placeholder="City">
           </div>


          </div>  
              <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name= "edit" class="btn btn-primary">Save changes</button>
        </form>
       

                            </td>
       
      </div>
    </div>
  </div>
</div> 

                                  <!-- Delete Modal -->

<td>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $id; ?> ">
DELETE
</button>
    <div class="modal" tabindex="-1" role="dialog" id="deleteModal<?php echo $id; ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <p>Are you sure you want to delete?</p>
        <input type="text" hidden name="s_id" value="<?php echo $id; ?>" id="">

      </div>
      
      <div class="modal-footer">
      
      <button type="submit" name= "delete" class="btn btn-primary">Save changes</button>
    </form>
        
      </div>
    </div>
  </div>
</div>

                            </td>
                            
                        </tr>


                    <?php
                        $i++;
                        }
                    }

            ?>
            

                      </tbody>

                             <!-- PHP Edit Code  -->
       <?php 
                if(isset($_POST['edit']))
                {
                     $update_id = $_POST['s_id'];
                    $update_name = $_POST['c_name'];
                    $update_mobile = $_POST['c_mobile_no'];
                    $update_city = $_POST['c_city'];
                   $query_update = "UPDATE customer_registeration SET c_name ='$update_name' , c_mobile_no = '$update_mobile',c_city='$update_city' WHERE customer_id = '$update_id' ";
                   $result_query_update = mysqli_query($connection,$query_update);
                   if($result_query_update)
                   {
                      header("Location:view_users.php");
                   }
                   else
                   {
                       echo "Error".mysqli_error($connection);
                   }
                }

        ?>

<?php
 if(isset($_POST['delete']))
 {
      $delete_id = $_POST['s_id'];
    //  $update_name = $_POST['s_name'];
    //  $update_mobile = $_POST['s_mobile_no'];
    $query_delete = "DELETE FROM customer_registeration  WHERE customer_id = '$delete_id' ";
    $result_query_delete = mysqli_query($connection,$query_delete);
    if($result_query_delete)
    {
       header("Location:view_users.php");
    }
    else
    {
        echo "Error".mysqli_error($connection);
    }
 }

?>




 <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->

  
                      </table>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
          
          </div>

          <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     
  <?php include "user_includes/footer.php" ;?>
