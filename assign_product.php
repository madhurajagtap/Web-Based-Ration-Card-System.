<?php include "user_includes/header.php" ;?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Assign Product To Shop User</h1>
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

$query  = "SELECT * FROM shop_registeration";
$result = mysqli_query($connection,$query);

if($result)
{
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        $shop_id = $row['shop_id'];
        $s_name=$row['s_name'];
        $s_email=$row['s_email'];
        $price=$row['s_password'];
        $s_mobile_no=$row['s_mobile_no'];
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
            <a href="assign_to_shop.php?shop_id=<?php echo $shop_id;?>" class="btn btn-warning">
                Assign
            </a>
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
                     $update_id = $_POST['product_id'];
                    $update_name = $_POST['product_name'];
                    $update_price = $_POST['product_mrp'];
                    $update_quantity = $_POST['product_quantity'];
                   $query_update = "UPDATE product_details SET product_name ='$update_name' ,product_quantity = '$update_quantity',product_mrp = '$update_price' WHERE product_id = '$update_id' ";
                   $result_query_update = mysqli_query($connection,$query_update);
                   if($result_query_update)
                   {
                      header("Location:add_product.php");
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
      $delete_id = $_POST['product_id'];
    //  $update_name = $_POST['s_name'];
    //  $update_mobile = $_POST['s_mobile_no'];
    $query_delete = "DELETE FROM product_details  WHERE product_id = '$delete_id' ";
    $result_query_delete = mysqli_query($connection,$query_delete);
    if($result_query_delete)
    {
       header("Location:add_product.php");
    }
    else
    {
        echo "Error".mysqli_error($connection);
    }
 }

?>


            
    </tbody>

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
