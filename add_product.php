<?php include "user_includes/header.php" ;?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
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
                      Product Details
                      </b></div>
                      <br>
                      <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal">
                          Add Product
                      </button>

      <div class="modal" id="mymodal">
       <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Produt Details</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body"> 

  
            <form action="" method="post" enctype="multipart/form-data">


                <div class="form-group ">
                  <label for="">Product Name</label>
                    <input type="text" name="product_name" class="form-control" id="exampleFirstName" placeholder="Enter Product Name">
                  </div>
                  <div class="form-group ">
                  <label for="">Product MRP</label>

                    <input type="text" name="product_mrp" class="form-control form-control-user" id="exampleFirstName" placeholder="Enter Price">
                  </div>
                  <div class="form-group ">
                  <label for="">Product Quantity</label>

                    <input type="text" name="product_quantity" class="form-control form-control-user" id="exampleFirstName" placeholder="Enter Quantity">
                  </div>
                  <div class="form-group ">
                  <label for="">Product Image</label>

                    <input type="file" name="image" class="form-control form-control-user" id="exampleFirstName" placeholder="Enter Quantity">
                  </div>
                     </div>
                <div class="modal-footer">
                    
                    <input type="submit" name="addproduct"  value="Add" class="btn btn-primary">
                    
                    </form>

                
                </div>
            </div>
</div>
</div>
       


    <br>
            <br>
            <?php
                    if(isset($_POST['addproduct']))
                    {
                    //  echo "success";
                    
                    $product_name =$_POST['product_name'];
                    $product_price=$_POST['product_mrp'];
                    $product_quantity=$_POST['product_quantity'];

                    if(isset($_FILES['image']))
                    {
                      

                      $errors= array();
                      $file_name = $_FILES['image']['name'];
                      $file_size =$_FILES['image']['size'];
                      $file_tmp =$_FILES['image']['tmp_name'];
                      $file_type=$_FILES['image']['type'];
                      
                  
                      if(empty($errors)==true){
                         move_uploaded_file($file_tmp,"images/".$file_name);
                       //  echo "Success";
                         $image = $file_name;

                      }else{
                         print_r($errors);
                         $image = "";

                      }
                   }
            
                   
            
                    
                     
            $query_insert ="INSERT INTO product_details(product_name,product_mrp,product_quantity,product_img) VALUES('$product_name','$product_price','$product_quantity','$image')";
            $insert_result = mysqli_query($connection,$query_insert);
                        
                        if($insert_result)
                       {
                         // echo"<script>alert('data inserted successfully')</script>";
                          // echo "data added";
                          
                        
                        }
                        else
                        {
                            echo "error".mysqli_error($connection);
                        }        
                       
                     
                     
                    
                   }
                       
                 ?>
<!-- Earnings (Monthly) Card Example -->
<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
<br>
    
<thead >
        <tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Image</th>
            <th>MRP</th>
            <th>QTY</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
    </thead>

   
    <tfoot >
        <tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Image</th>
            <th>MRP</th>
            <th>QTY</th>
            <th>Edit</th>
            <th>Delete</th>

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
        $id = $row['product_id'];
        $name=$row['product_name'];
        $image=$row['product_img'];
        $price=$row['product_mrp'];
        $quantity=$row['product_quantity'];
        ?>
    <tr>
        <td>
        <?php echo $i  ?>
        </td>
        <td>
            <?php echo $name  ?>
        </td>
        <td>
            <?php if($image)
            {
              ?>
              <img width="150px" height="150px" src="images/<?php echo $image; ?>" alt="">
              <?php
            }else
            {
              echo "No Image Found!!";
            }  
            
            ?>
        </td>
       
        <td>
            <?php echo $price  ?>
        </td><td>
            <?php echo $quantity  ?>
        </td>
        <td>
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $id; ?> ">
  EDIT
    </button>
                                        <!-- Edit Modal -->
    <div class="modal" id="exampleModal<?php echo $id; ?>">
    <div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header">
                        <h3 class="modal-title">Add Product Details</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
         <div class="modal-body"> 

       <form action="" method="post" enctype="multipart/form-data">
         <div class="form-group ">
         <?php // echo $name ?>
             <input type="text"  name="product_name" value="<?php echo $name;?>" class="form-control form-control-user"  placeholder="Name">
         </div>

          <div class="form-group ">
              <input type="text" hidden name="product_id" value="<?php echo $id; ?>" id="">
              <input type="tel"  name="product_quantity" value="<?php echo $quantity; ?>" class="form-control form-control-user"  placeholder="Quantity">
           </div>
           <div class="form-group ">
              <input type="text" hidden name="product_id" value="<?php echo $id; ?>" id="">
              <input type="tel"  name="product_mrp" value="<?php echo $price; ?>" class="form-control form-control-user"  placeholder="Price">
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
                  <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <p>Are you sure you want to delete?</p>
                    <input type="text" hidden name="product_id" value="<?php echo $id; ?>" id="">

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
                     $update_id = $_POST['product_id'];
                    $update_name = $_POST['product_name'];
                    $update_price = $_POST['product_mrp'];
                    $update_quantity = $_POST['product_quantity'];
                   $query_update = "UPDATE product_details SET product_name='$update_name',  product_quantity = '$update_quantity',product_mrp = '$update_price' WHERE product_id = '$update_id' ";
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
