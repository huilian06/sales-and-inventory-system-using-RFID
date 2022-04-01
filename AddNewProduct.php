<?php
    session_start();
?>
<?php 
      if(!isset($_SESSION['username'])){
      header("Location:index.php"); } 
?>

<!DOCTYPE html>
<?php include("func_add_new_product.php");?>
<html lang="en">
  <head>

   <?php include("fixed.html");?>

<head>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Welcome,<?php echo $_SESSION['username']; echo "!"; ?></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Product</a></li>
                            <li class="active">Home</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>


<div class="main">


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add Product</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="func_add_new_product.php " method="post" enctype="multipart/form-data">
              <div class="box-body">

              

                <div class="form-group">

                  <label for="product_image">Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image" type="file">

                      </div>
                  </div>
                </div>
             
             <div class="row">
  <div class="col"> 
              <div class="form-group">
                  <label for="sku">Product ID</label>
                  <input type="text" class="form-control" id="product_id" name="product_id" value="<?php echo $pdid; ?>"  autocomplete="off" readonly />
                </div>
 </div>

                <div class="col">
                <div class="form-group">
                  <label for="product_name">Product name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" required/>
                   <span id="product_name" class="text-danger font-weight-bold"></span>
                </div></div></div>

<div class="row">
  <div class="col">
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter price" autocomplete="off" onkeyup="valPrice()" required/>
                  <span id="price-alert" class="text-danger font-weight-bold"></span>
                </div>
 </div>

                <div class="col">
                <div class="form-group">
                  <label for="quantity">Qty</label>
                  <input type="text" class="form-control" id="product_quantity" name="product_quantity" placeholder="Enter Qty" autocomplete="off" onkeyup="valQty()" required/>
                  <span id="qty-alert" class="text-danger font-weight-bold"></span>
                </div></div></div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Enter description" required/>
                </div>
<div class="row">
  <div class="col">
                <div class="form-group">
                  <label for="Availability">Availability</label>
                  <select class="form-control" id="product_availability" name="product_availability">
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                  </select>
                </div>
 </div>

                <div class="col">
                <div class="form-group">
                  <label>RFID No</label>
                  <input type="text" class="form-control" id="rfid_pro" name="rfid_pro" placeholder="Enter RFID No" required/>
                </div></div></div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="addnewproduct" class="btn btn-primary">Save</button>
                <a href="product.php" class="btn btn-warning">Back</a>
              </div>
            </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
    

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">

  function valPrice(){
   var product_price = document.getElementById('product_price').value;
    var priceAlert= document.getElementById("price-alert");
    
    if (isNaN(product_price)){
      priceAlert.style.display="block";
      priceAlert.innerHTML="***Only Number is Allowed";
      priceFlag=false;
    }
    else{
      priceAlert.style.display="none";
      priceFlag=true;
   } 
}

 function valQty(){
   var product_quantity = document.getElementById('product_quantity').value;
    var qtyAlert= document.getElementById("qty-alert");
    
    if (isNaN(product_quantity)){
      qtyAlert.style.display="block";
      qtyAlert.innerHTML="***Only Number is Allowed";
      qtyFlag=false;
    }
    else{
      qtyAlert.style.display="none";
      qtyFlag=true;
   } 
}

</script>

