<?php include "user_includes/header.php" ;?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Shop User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                      $shop_user = "SELECT * FROM shop_registeration ";
                      $result = mysqli_query($connection,$shop_user);
                      if($result)
                    {
                      $i=0;
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $id = $row['shop_id'];
                          
                    $i++;
                    
                        }
                      echo $i;
                    }
                      
                      ?>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Customer</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                      $customer = "SELECT * FROM customer_registeration ";
                      $result = mysqli_query($connection,$customer);
                      if($result)
                    {
                      $i=0;
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $id = $row['customer_id'];
                          
                    $i++;
                    
                        }
                      echo $i;
                    }
                      
                      ?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Product</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php
                      $product = "SELECT product_id FROM product_details  ";
                      $result = mysqli_query($connection,$product);
                      if($result)
                    {
                      $i=0;
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $id = $row['product_id'];
                          
                    $i++;
                    
                        }
                      echo $i;
                    }
                      
                      ?></div>
                        </div>
                        <!-- <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Assigned Product</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                      $product = "SELECT DISTINCT product_id
                      FROM assign_to_shop  ";
                      $result = mysqli_query($connection,$product);
                      if($result)
                    {
                      $i=0;
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $id = $row['product_id'];
                          
                    $i++;
                    
                        }
                      echo $i;
                    }
                      
                      ?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

         
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     
  <?php include "user_includes/footer.php" ;?>
