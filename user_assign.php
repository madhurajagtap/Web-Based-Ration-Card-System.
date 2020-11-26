<?php include "user_includes/shop_heder.php" ;?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Assign Product to Customer</h1>
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
                      <?php $customer_id =  $_GET['customer_id']; ?>
                      </b>
                      <table class="table table-bordered table-hover dataTable " id="dataTable">
                        <thead>
                            <tr>
                                <th>Customer Id</th>
                                <th>Customer Name</th>
                                <th>Customer Mobile</th>
                                <th>Customer Email</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php

$query  = "SELECT * FROM customer_registeration WHERE customer_id = '$customer_id'";
$result = mysqli_query($connection,$query);

if($result)
{
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        $customer_id = $row['customer_id'];
        $c_name=$row['c_name'];
        $c_email=$row['c_email'];
        $c_password=$row['c_password'];
        $c_mobile_no=$row['c_mobile_no'];
        $ration_number =$row['ration_number'];

        ?>

        <tr>
            <td><?php echo $customer_id; ?></td>
            <td><?php echo $c_name; ?></td>
            <td><?php echo $c_mobile_no; ?></td>
            <td><?php echo $c_email; ?></td>

        </tr>


<?php
    $i++;
    }
}

            ?>
            
                        
                        </tbody>
                      </table>
                      </div>
                      <br>
                      <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal">
                          Add Product
                      </button> -->

     
                    </div>
       


    <br>
           
<!-- Earnings (Monthly) Card Example -->
<table class="table table-bordered table-hover dataTable " id="dataTable" width="100%" cellspacing="0">
<br>
<form action="" method="post">
<thead >
<tr>
<td>Sr No</td>


<th>Product Name</th>

<th>Product Imgae</th>
<th>Available Quantity</th>


<th>Assign Quantity To User</th>

<th>Assign</th>

           

        </tr>
    </thead>

   
    <tfoot >
        <tr>
            <td>Sr No</td>


            <th>Product Name</th>

            <th>Product Imgae</th>
            <th>Available Quantity</th>
       

            <th>Assign Quantity To User</th>

            <th>Assign</th>

           

        </tr>
    </tfoot>
    <tbody>
    
          
    <?php

$query  = "SELECT * FROM assign_to_shop WHERE shop_id = '$shop_session_id' ";
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


        $query_prodcut  = "SELECT * FROM product_details WHERE product_id = '$product_id'";
        $result_product = mysqli_query($connection,$query_prodcut);

        if($result_product)
        {
            $i=1;
            while($row=mysqli_fetch_assoc($result_product))
            {
                $product_name = $row['product_name'];
                $product_img = $row['product_img'];
                $product_mrp = $row['product_mrp'];

                
               // $name=$row['s_name'];
        
         
        ?>
    <tr>
   
    <form action="" method="post">
   <td>
   <?php echo $i; ?>
   </td>
    
        
        <td>
            <?php echo $product_name  ?>
        </td>
       
        <td>
            <?php if($product_img)
            {
              ?>
              <img width="100px" height="100px" src="images/<?php echo $product_img; ?>" alt="">
              <?php
            }else
            {
              echo "No Image Found!!";
            }  
            
            ?>
        </td>
        <td>
            <?php echo $product_qty  ?>
        </td>
        <td>
    <input type="hidden"  value="<?php echo $product_id; ?>" name="p_id" class="form-control" placeholder="Enter Quantity" id="">
    <input type="hidden"  value="<?php echo $customer_id; ?>" name="customer_id" class="form-control" placeholder="Enter Quantity" id="">
    <input type="hidden"  value="<?php echo $product_qty; ?>" name="p_quantity" class="form-control" placeholder="Enter Quantity" id="">

            <input required type="text" name="qty" class="form-control" placeholder="Enter Quantity" id="">
        </td>
       <td>
            <input type="submit" class="btn btn-success" value="assign" name="assign_to_shop" id="">
       </td>
        
        </form>
                        </tr>
                                    <?php
                        $i++;
                        }
}
else
{
    echo "
    <tr>
        <td colspan=4>No Result Found</td>
    </tr>
    ";
}
}
}
            ?>
            

                      </tbody>




</table>
<!-- 
<input type="submit_add" name="assign_to_shop" class="btn btn-success" value="Assign" id=""> -->

</form>


<?php

if(isset($_POST['assign_to_shop']))
{
  echo "clicked"; 
  $shop_id_selected =  $shop_session_id;
  $qty =  $_POST['qty'];
  $p_id =  $_POST['p_id'];
  $customer_id = $_POST['customer_id'];
  $previous_quantity=$_POST['p_quantity'];
 $final_quantity = $previous_quantity-$qty;
            $query_insert ="INSERT INTO assign_to_user(shop_id,customer_id,product_id,product_qty) VALUES('$shop_id_selected','$customer_id','$p_id','$qty')";
            $insert_result = mysqli_query($connection,$query_insert);
                        
                        if($insert_result)
                       {
                        echo "<script>
                        alert('Product asssign Successfully');
                        </script>";

                          
                        
                        }
                        else
                        {
                            echo "error".mysqli_error($connection);
                        }   
        

                        $query_update_product = "UPDATE assign_to_shop SET product_qty='$final_quantity' WHERE product_id = '$p_id' ";
                        $update_result_product = mysqli_query($connection,$query_update_product);
                        if($update_result_product)
                        {
                          // echo "sucessfully updated";
                          header('Location: '.$_SERVER['REQUEST_URI']);
                        }
                        else
                        {
                        echo"error".mysqli_error($connection);
                        }
    
    }

    ?>
    </div>
        </div>
            <!-- Content Row -->
            

          <!-- Content Row -->

         
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     
  <?php include "user_includes/footer.php" ;?>
