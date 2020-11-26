<?php include "user_includes/header.php" ;?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
          </div>
    <div class="body">
    <div class="row">
           
            <div class="col-lg-12 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      <b>
                      Profile Details
                      </b></div>
                      <br>
                      <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal">
                          Add Product
                      </button> -->

     
</div>
       


    <br>
           
<!-- Earnings (Monthly) Card Example -->
<table class="table table-bordered table-hover dataTable " id="dataTable" width="100%" cellspacing="0">
<br>
    
<thead >
<tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
          
           

        </tr>
    </thead>

   
    <tfoot >
        <tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
           
           

        </tr>
    </tfoot>
    <tbody>
            
<?php

$query  = "SELECT * FROM admin_login";
$result = mysqli_query($connection,$query);

if($result)
{
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        $adminId = $row['admin_id'];
        $name=$row['Name'];
        $email=$row['admin_email'];
        $mobile=$row['contact_number'];
        
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
        </td><td>
            <?php echo $mobile  ?>
        </td>
        
                
                                        
                                    </tr>
                                    <?php
                        $i++;
                        }
}

            ?>
            

                      </tbody>

                             <!-- PHP Edit Code  -->
      
            
    

</table>
</div>
    </div>
          <!-- Content Row -->
         

          <!-- Content Row -->

         
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     
  <?php include "user_includes/footer.php" ;?>
