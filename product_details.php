<?php include "user_includes/header.php" ;?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">History Assign </h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

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
                           Shop Name
                        </th>

                        <th>
                             Product Name
                        </th>
                        <th>
                            Product Quantity
                        </th>
                        
                        <th>
                             Date& Time 
                        </th>
                    </tr>

            </thead>

            <tfoot>
            <tr>
            <th>
                           Sr No
                        </th>
                        <th>
                           Shop Name
                        </th>

                        <th>
                             Product Name
                        </th>
                        <th>
                            Product Quantity
                        </th>
                        
                        <th>
                             Date& Time 
                        </th>
                       
                    </tr>

            </tfoot>
            <tbody>
                    <?php

                    $query  = "SELECT * FROM assign_to_shop  ";
                    $result = mysqli_query($connection,$query);

                    if($result)
                    {
                        $i=1;
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $shop_id = $row['shop_id'];
                            $product_id=$row['product_id'];
                            $product_qty=$row['product_qty'];
                            $created_at=$row['created_at'];

                  
                    $query_name  = "SELECT * FROM shop_registeration WHERE shop_id = '$id'";
                    $result_name = mysqli_query($connection,$query_name);

                    if($result)
                    {
                        $i=1;
                        while($row=mysqli_fetch_assoc($result_name))
                        {
                            $id = $row['shop_id'];
                            $name=$row['s_name'];
                    
                        }
                    }
                    $query_prodcut  = "SELECT * FROM product_details WHERE product_id = '$product_id'";
                    $result_product = mysqli_query($connection,$query_prodcut);

                    if($result_product)
                    {
                        $i=1;
                        while($row=mysqli_fetch_assoc($result_product))
                        {
                            $product_name = $row['product_name'];
                           // $name=$row['s_name'];
                    
                        }
                    }
                 
                    ?>
                        <tr>
                            <td>
                            <?php echo $i  ?>
                            </td>
                            <td>
                                <?php echo $name  ?>
                            </td>
                            <td>
                                <?php echo $product_name  ?>
                            </td>
                           
                            <td>
                                <?php echo $product_qty  ?>
                            </td><td>
                                <?php echo $created_at  ?>
                            </td>
     


                           
                            
                        </tr>


                    <?php
                        $i++;
                        }
                    }

            ?>
            

                      </tbody>

                             <!-- PHP Edit Code  -->
      


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
