<?php
    session_start();
?>
<?php 
      if(!isset($_SESSION['username'])){
      header("Location:index.php"); } 
?>

<!DOCTYPE html>
<?php include("func_add_new_inventory.php");?>
<html lang="en">
  <head>

    <?php include("fixed.html");?>


</head>



<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Welcome,<?php echo $_SESSION['username']; echo "!"; ?></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="inventory.php">Raw Material</a></li>
                            <li class="active">Home</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>


<div class="main">


        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add New Raw Material</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="func_add_new_inventory.php " method="post" enctype="multipart/form-data">
              <div class="box-body">
       <div class="form-group">
                  <label for="inventory_image">Image</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="inventory_image" name="inventory_image" type="file">
                      </div>
                  </div>
                </div>
        <div class="row">
        <div class="col">
                <div class="form-group">
                  <label for="sku">Inventory ID</label>
                  <input type="text" class="form-control" id="inventory_id" name="inventory_id" value="<?php echo $ivid; ?>"  autocomplete="off" readonly />
                </div> </div>

                <div class="col">
                <div class="form-group">
                  <label for="inventory_name">Inventory name</label>
                  <input type="text" class="form-control" id="inventory_name" name="inventory_name" placeholder="Enter inventory name" required/>
                </div></div></div>

<div class="row">
  <div class="col">
                <div class="form-group">
                  <label>Price</label>
                  <input id="inventory_price" type="text" class="form-control" name="inventory_price" placeholder="Enter price" onkeyup="valPrice()" required/>
                 <span id="price-alert" class="text-danger font-weight-bold"></span>
                </div>
 </div>

                <div class="col">
                <div class="form-group">
                  <label for="qty">Qty</label>
                  <input type="text" class="form-control" id="inventory_quantity" name="inventory_quantity" placeholder="Enter Qty" autocomplete="off" onkeyup="valQty()" required/>
                  <span id="qty-alert" class="text-danger font-weight-bold"></span>
                </div></div></div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" id="inventory_description" name="inventory_description" placeholder="Enter description" required/>
                  
                </div>

<div class="row">
  <div class="col">
                <div class="form-group">
                  <label for="store">Availability</label>
                  <select class="form-control" id="inventory_availability" name="inventory_availability">
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                  </select>
                </div>

 </div>

                <div class="col">
                 <div class="form-group">
                  <label>RFID No</label>
                  <input type="text" class="form-control" id="rfid_inv" name="rfid_inv" placeholder="Enter RFID No" required/>
                </div> </div></div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="addnewinventory" class="btn btn-primary">Save</button>
                <a href="AddNewInventory.php" class="btn btn-warning">Back</a>
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
   var inventory_price = document.getElementById('inventory_price').value;
    var priceAlert= document.getElementById("price-alert");
    
    if (isNaN(inventory_price)){
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
   var inventory_quantity = document.getElementById('inventory_quantity').value;
    var qtyAlert= document.getElementById("qty-alert");
    
    if (isNaN(inventory_quantity)){
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