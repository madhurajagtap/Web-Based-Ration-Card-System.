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
                      <b> <?php 
                      $shop_id =  $_GET['shop_id'];
                       ?>
                     
                      </b>
                      <table class="table table-bordered table-hover dataTable " id="dataTable">
                        <thead>
                            <tr>
                                <th>Shop Id</th>
                                <th>Shop Name</th>
                                <th>Shop Mobile</th>
                                <th>Shop Location</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php

$query  = "SELECT * FROM shop_registeration WHERE shop_id = '$shop_id'";
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
        $city=$row['city'];

        ?>

        <tr>
            <td><?php echo $shop_id; ?></td>
            <td><?php echo $s_name; ?></td>
            <td><?php echo $s_mobile_no; ?></td>
            <td><?php echo $city; ?></td>
            

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

$query  = "SELECT * FROM product_details";
$result = mysqli_query($connection,$query);

if($result)
{
    $i=1;

    while($row=mysqli_fetch_assoc($result))
    {
        $product_id = $row['product_id'];
        $name=$row['product_name'];
        $image=$row['product_img'];
        $price=$row['product_mrp'];
        $available_quantity=$row['product_quantity'];
        ?>
    <tr>
   
    <form action="" method="post">
   <td>
   <?php echo $i; ?>
   </td>
    
        
        <td>
            <?php echo $name ; ?>
        </td>
       
        <td>
            <?php if($image)
            {
              ?>
              <img width="100px" height="100px" src="images/<?php echo $image; ?>" alt="">
              <?php
            }else
            {
              echo "No Image Found!!";
            }  
            
            ?>
        </td>
        <td>
            <?php echo $available_quantity;  ?>
        </td>
        <td>
    <input type="hidden"  value="<?php echo $product_id; ?>" name="p_id" class="form-control" placeholder="Enter Quantity" id="">
    <input type="hidden"  value="<?php echo $available_quantity; ?>" name="p_quantity" class="form-control" placeholder="Enter Quantity" id="">

            <input required type="text" name="qty" class="form-control" placeholder="Enter Quantity" id="">
        </td>
       <td>
            <input type="submit" class="btn btn-success" value="Assign" name="assign_to_shop" id="">
       </td>
        
        </form>
                        </tr>
                                    <?php
                        $i++;
                        }
}

            ?>
            

                      </tbody>




</table>

<!-- <input type="submit_add" name="assign_to_shop" class="btn btn-success" value="Assign" id=""> -->

</form>


<?php

if(isset($_POST['assign_to_shop']))
 
{
   
  // echo "clicked"; 
   $shop_id_selected =  $_GET['shop_id'];
    $p_quantity =  $_POST['p_quantity'];
    $qty =  $_POST['qty'];
     $p_id =  $_POST['p_id'];
     echo $p_quantity;
     $final_quantity = $p_quantity - $qty;

        
    
  if($qty<=$p_quantity)
    {         
      
      
            
            $query_insert ="INSERT INTO assign_to_shop (shop_id,product_id,product_qty) VALUES ('$shop_id_selected','$p_id','$qty')";
            $insert_result = mysqli_query($connection,$query_insert);
                        
                        if($insert_result)
                       {
                        
                        echo "<script>
                        alert('Product asssign Successfully');
                        </script>";
                        echo "error".mysqli_error($connection);
                    
                       }
                        else
                        {
                            echo "error".mysqli_error($connection);
                        }   
        
                      }
                      else
                      {
                        echo"
                        <script>
                        alert('Enter the correct Quantity');
                        </script>";
                      }
   
    $query_update = "UPDATE  product_details SET product_quantity='$final_quantity' WHERE product_id = '$p_id' ";
    $update_result = mysqli_query($connection,$query_update);
    if($update_result)
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
