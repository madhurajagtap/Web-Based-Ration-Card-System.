
<?php include "user_includes/shop_heder.php" ;?>

<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Assign Product to User</h1>
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
              Assgin Details
              </b></div>
              <br>

              <form action="" method="post">
                <div class="form-group">
                    <input type="text"  name="search_user_mobile" placeholder="Enter Mobile Number Of User" class="form-control" id="">
                </div>
                <div class="form-group">
                    <input type="submit" name="search_btn" value="Search Number" class="btn btn-success" id="">
                </div>
              <?php
                if(isset($_POST['search_btn']))
                {
                   
                    $search_user_mobile_1 = $_POST['search_user_mobile'];
                     $digits = 4;
                      $otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
                ?>
                <div class="form-group">
                    
                    <input type="hidden"   name="search_number" value="<?php echo $search_user_mobile_1; ?>" placeholder="Enter OTP From User Mobile" class="form-control" id="">

                    <label for=""><span class="bg-success text-light">Your OTP is <?php echo $otp; ?></span></label>
                    <input type="text"   name="search_otp" placeholder="Enter OTP From User Mobile" class="form-control" id="">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit_otp" value="Enter OTP" class="btn btn-success" id="">
                </div>
                   <?php
                }
              ?>
              </form>
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
    <th>Mobile</th>
    <th>Assign</th>
   

</tr>
</thead>


<tfoot >
<tr>
    <th>Sr No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Assign</th>
   

</tr>
</tfoot>
<tbody>
    
<?php
if(isset($_POST['submit_otp']))
{
    $search_number = $_POST['search_number'];
    $query_read  = "SELECT * FROM customer_registeration WHERE c_mobile_no='$search_number'";
// Return the number of rows in result set
// Return the number of rows in result set
 $count = 0;
 $result = mysqli_query($connection,$query_read);
if(mysqli_num_rows($result)>0 )
{
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
    $shop_id = $row['customer_id'];
    $s_name=$row['c_name'];
    $s_email=$row['c_email'];
    $price=$row['c_password'];
    $s_mobile_no=$row['c_mobile_no'];
    ?>
    <tr>
    <td>
    <?php echo $i  ?>
    </td>
    <td>
        <?php echo $s_name  ?>
    </td>


    <td>
        <?php echo $s_email  ?>
    </td><td>
        <?php echo $s_mobile_no  ?>
    </td>
    <td>
        <a href="user_assign.php?customer_id=<?php echo $shop_id;?>" class="btn btn-warning">
            Assign
        </a>
    </td>

    
            
                                    
                                </tr>
                                <?php
                    $i++;
                    }
}
else
{
    echo "
    <script>
        alert('No user FOund' );
    </script>
    ";
}

}
else
{
    echo "
    
    <tr>
    <td class='text-center 'colspan='5'>No Result Found</td>
    </tr>
    ";
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
