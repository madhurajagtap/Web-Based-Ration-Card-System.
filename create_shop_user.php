<?php include "user_includes/header.php" ;?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Shop Dashboard</h1>
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
                      Shop Details
                      </b></div>
                      <br>
                      <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal">
                          Add Shop
                      </button>

      <div class="modal" id="mymodal">
       <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Shop Details</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body"> 


                <form action="" method="post">


                <div class="form-group ">
                  
                    <input type="text" name="s_name" class="form-control form-control-user" id="exampleFirstName" placeholder=" Name">
                  </div>
                  <div class="form-group ">
                  
                    <input type="text" name="s_city" class="form-control form-control-user" id="examplecity" placeholder=" City">
                  </div>
                  <div class="form-group ">
                  
                  <input type="tel" name="s_contact" class="form-control form-control-user" id="examplecontact" placeholder=" Contact Number">
                </div>
                <div class="form-group ">
                  
                  <input type="text" name="aadhar_number" class="form-control form-control-user" id="exampleaadhar" placeholder="Aadhar Card Number">
                </div>
                <div class="form-group ">
                  
                  <input type="email" name="s_email" class="form-control form-control-user" id="examplemail" placeholder=" Email Id">
                </div>
              
                <div class="form-group ">
                  
                  <input type="Password" name="s_password" class="form-control form-control-user" id="examplepass" placeholder="Password">
                </div>
                
              
 

                
                
                </div>
                <div class="modal-footer">
                    <!-- <button type="submit"  name="register" class="btn btn-primary" >
                        click here
                    </button> -->
                    <input type="submit" name="addshop" class="btn btn-primary">
                    <?php
                    if(isset($_POST['addshop']))
                    {
                     echo "success";
                    
                    $shopkeeper_name =$_POST['s_name'];
                    $shopkeeper_city=$_POST['s_city'];
                     $shopkeeper_contact=$_POST['s_contact'];
                     $email =$_POST['s_email'];
                     $password=$_POST['s_password'];
                     $aadhar=$_POST['aadhar_number'];
                    
                    
                     
            $query_insert ="INSERT INTO shop_registeration(s_name,city,s_mobile_no,s_email,s_password,aadhar_number) VALUES('$shopkeeper_name','$shopkeeper_city','$shopkeeper_contact','$email','$password','$aadhar')";
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
                            Aadhar Number
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
                            Aadhar Number
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

                    $query  = "SELECT * FROM shop_registeration";
                    $result = mysqli_query($connection,$query);

                    if($result)
                    {
                        $i=1;
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $id = $row['shop_id'];
                            $name=$row['s_name'];
                            $city=$row['city'];
                            $mobile=$row['s_mobile_no'];
                            $email=$row['s_email'];
                            $password=$row['s_password'];
                            $aadhar=$row['aadhar_number'];
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
                            </td>
                            <td>
                                <?php echo $aadhar  ?>
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
                    <h3 class="modal-title">Add Shop Details</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
         <div class="modal-body"> 

       <form action="" method="post">
         <div class="form-group ">
             <input type="text"  name="s_name" value="<?php echo $name;?>" class="form-control form-control-user"  placeholder="Name">
         </div>

          <div class="form-group ">
              <input type="text" hidden name="s_id" value="<?php echo $id; ?>" id="">
              <input type="tel"  name="s_mobile_no" value="<?php echo $mobile; ?>" class="form-control form-control-user"  placeholder="Contact Number">
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
                    $update_name = $_POST['s_name'];
                    $update_mobile = $_POST['s_mobile_no'];
                   $query_update = "UPDATE shop_registeration SET s_name ='$update_name' , s_mobile_no = '$update_mobile' WHERE shop_id = '$update_id' ";
                   $result_query_update = mysqli_query($connection,$query_update);
                   if($result_query_update)
                   {
                      header("Location:create_shop_user.php");
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
    $query_delete = "DELETE FROM shop_registeration  WHERE shop_id = '$delete_id' ";
    $result_query_delete = mysqli_query($connection,$query_delete);
    if($result_query_delete)
    {
       header("Location:create_shop_user.php");
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
