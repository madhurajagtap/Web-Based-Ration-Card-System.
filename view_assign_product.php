<?php include "user_includes/shop_heder.php" ;?>


        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Assign Product History</h1>
            <?php   $shop_session_id;?>
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
                      Assign Product Details
                      </b></div>
                      <br>
                      

      
</div>
       


    <br>
            <br>
         
<!-- Earnings (Monthly) Card Example -->
<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
<br>
    
<thead >
        <tr>
            <th>Sr No</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product MRP</th>
            <th>Assigned Quantity</th>
            


        </tr>
    </thead>

   
    <tfoot >
        <tr>
        <th>Sr No</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product MRP</th>
            <th>Assigned Quantity</th>

        </tr>
    </tfoot>
    <tbody>
            
<?php

$query  = "SELECT * FROM assign_to_shop WHERE shop_id='$shop_session_id'";
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
       
        $query_product  = "SELECT * FROM product_details WHERE product_id = '$product_id'";
        $result_product = mysqli_query($connection,$query_product);

        if($result_product)
        {
          
            while($row=mysqli_fetch_assoc($result_product))
            {
                $product_name = $row['product_name'];
                $product_img = $row['product_img'];
                $product_mrp = $row['product_mrp'];

                
               // $name=$row['s_name'];
        
         

        ?>
    <tr>
        <td>
        <?php echo $i  ?>
        </td>
        <td>
            <?php echo $product_name  ?>
        </td>
        <td>
            <?php if($product_img)
            {
              ?>
              <img width="150px" height="150px" src="images/<?php echo $product_img ?>" alt="">
              <?php
            }
            else
            {
              echo "No Image Found!!";
            }  
            
            ?>
        </td>
       
        <td>
            <?php echo $product_mrp  ?>
        </td><td>
            <?php echo $product_qty ?>
        </td>
      
                           <!-- Edit Modal -->
                           
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
