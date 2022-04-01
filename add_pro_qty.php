<?php
    session_start();
?>
<?php 
      if(!isset($_SESSION['username'])){
      header("Location:index.php"); } 
?>
<!DOCTYPE html>

<html lang="en">
  <head>

    <?php include("fixed.html");?>
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<?php  

      $output = '';  
       include("db.php");  
        $edit_pro_id=$_GET['add'];
 $query ="SELECT * FROM product  WHERE product_id = '$edit_pro_id'";  
 $result = mysqli_query($connect, $query)or die( mysqli_error($connect));  
     
      while($row = mysqli_fetch_array($result))  
      {  
         $product_id=$row[0];
  $product_price=$row[2];
 $product_quantity=$row[3];
  $product_description=$row[5];
  $product_name=$row[1];
   $product_availability=$row[6];
   $product_image=$row[4];
   $rfid_pro=$row[7];           
      }  
 ?>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Welcome,<?php echo $_SESSION['username']; echo "!"; ?></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="product.php">Product</a></li>
                            <li class="active">Home</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
               
<?php

  include("db.php");
$noti="";
$query ="SELECT * FROM product  WHERE product_id = '$edit_pro_id'";  
 $result = mysqli_query($connect, $query);  
  while($row = mysqli_fetch_array($result))  
      {  
         $product_id=$row[0];
  $product_price=$row[2];
 $product_quantity=$row[3];
  $product_description=$row[5];
  $product_name=$row[1];
   $product_availability=$row[6];
   $product_image=$row[4];
   $rfid_pro=$row[7];          
      }  

if(isset($_POST['update_pro_qty']))
{ 
	
$product_id=$_POST['product_id'];
  $product_qty=$_POST['product_qty'];
 
$new_pro_qty= $product_qty+$product_quantity;


  $update="UPDATE product set product_quantity='$new_pro_qty' where product_id='$product_id';";
   $query1=mysqli_query($connect,$update) or die(mysqli_error($connect));
    
   if($query1==1)
    {
    	$noti = '<div class="alert alert-success" role="alert">Records successfully updated</div>';
       //echo "<script>alert('Update Saved!')</script>";
        //echo "<script>window.open('up_inv_qty.php','_self')</script>";
      } 

      else
        {
        $noti = '<div class="alert alert-success" role="alert">Records Fail updated</div>';
      } 


    
}
?>
<body ng-app="">
<div class="main">

         <form role="form" action="" method="post"><?php echo $noti; ?>
              
            </form>
                
<?php
include("dbconn.php"); 
    $alert= "";
        if(isset($_POST['but_update'])){



          $product_id=$_POST['product_id'];
  $product_qty=$_POST['product_qty'];
 
$new_pro_qty= $product_qty+$product_quantity;


  $update="UPDATE product set product_quantity='$new_pro_qty' where product_id='$product_id';";
   $query1=mysqli_query($connect,$update) or die(mysqli_error($connect));
            if(isset($_POST['update'])){


                foreach($_POST['update'] as $updateid){
                    $inventory_name = $_POST['inventory_name_'.$updateid];
                    $inv_qty_used = $_POST['inv_qty_used_'.$updateid];
                    $inventory_quantity = $_POST['inventory_quantity_'.$updateid];
                    $qty=$_POST['qty'];
                 // $qty_used = $_POST['qty_used_'.$updateid];
                    $new_inv_qty=$inventory_quantity-($inv_qty_used*$qty);

 
                    if($inventory_name !='' && $inv_qty_used != '' ){

                        $updateInv = "UPDATE inventory SET inventory_quantity='".$new_inv_qty."' WHERE inventory_id='".$updateid."'";
                           mysqli_query($conn,$updateInv);
                       
                    }
                     
                }
                $alert = '<div class="alert alert-success" role="alert">Records successfully updated</div>';
            }
        }
 ?>
 <div class='container'>
            <form method='post' action=''><?php echo $alert; ?>
                

<div class="box-body">
<div class="row">
                            <label>Product ID</label>
                            <input type="text" name="product_id" class="form-control checkField" value="<?php echo $product_id;?>"readonly>
                                      
                  <br>

                <div class="col">
                <div class="form-group">
                  <label for="quantity">Qty</label>
                  <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Enter Qty" autocomplete="off" onkeyup="GetValue(this.value)" ng-model="product_qty" required/>
                  <span id="qty-alert" class="text-danger font-weight-bold"></span>
                </div></div>
    
                  </div> 

<p><input type='submit' value='Update Selected Records' class="btn btn-success" name='but_update'></p>


                <table class="table table-bordered">
                    <tr style='background: whitesmoke;'>
                        <!-- Check/Uncheck All-->
                        <th><input type='checkbox' id='checkAll' ></th>
                        <th>Raw Materials</th>
                         <th>Qty In Hand</th>
                        <th>Qty Needed</th>
                         
                        
                    </tr>
                    <?php
$query ="SELECT * FROM product_detail
NATURAL JOIN inventory WHERE product_id = '$edit_pro_id'";  
 $result1 = mysqli_query($connect, $query)or die( mysqli_error($connect));  
  while($row = mysqli_fetch_array($result1))  {
    $product_id=$row['product_id'];
    $inventory_id=$row['inventory_id'];
      $inv_qty_used=$row['inv_qty_used'];
      $inventory_name=$row['inventory_name'];
      $inventory_quantity=$row['inventory_quantity'];
    $qty_used='';

?>
                 <input type="hidden" name="qty" value="{{product_qty}}">
   
                        <tr>
                            <td><input type='checkbox' name='update[]' value='<?= $inventory_id ?>' ></td>
                            <td><input type='text' name='inventory_name_<?= $inventory_id ?>' value='<?= $inventory_name ?>' readonly></td>
                            <td><input type='text' name='inventory_quantity_<?= $inventory_id ?>' value='<?= $inventory_quantity ?>' readonly ></td>
                            <td><input type='text' name='inv_qty_used_<?= $inventory_id ?>' value='<?= $inv_qty_used?>' ></td>
                            <td><input type='hidden' name='qty_used_<?= $inventory_id ?>' value='{{product_qty}}' ></td>
                           
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </form>
        </div>

   

</body>



        <script type="text/javascript">
            $(document).ready(function(){
                // Check/Uncheck ALl
                $('#checkAll').change(function(){
                    if($(this).is(':checked')){
                        $('input[name="update[]"]').prop('checked',true);
                    }else{
                        $('input[name="update[]"]').each(function(){
                            $(this).prop('checked',false);
                        }); 
                    }
                });
                // Checkbox click
                $('input[name="update[]"]').click(function(){
                    var total_checkboxes = $('input[name="update[]"]').length;
                    var total_checkboxes_checked = $('input[name="update[]"]:checked').length;
 
                    if(total_checkboxes_checked == total_checkboxes){
                        $('#checkAll').prop('checked',true);
                    }else{
                        $('#checkAll').prop('checked',false);
                    }
                });
            });
        </script>

            
            <script type="text/javascript">
                $(document).ready(function(){
        
    })
/*
$(document).ready(function(){

$("product_qty").change(function(){

$("second").val($(this). val());

});

}); */
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



function GetValue(){
	var value=$('#product_qty').val();
	$('#pam').text(value);
	console.log(value);
}
</script>

<script src="jquery.min.js"></script>
<script>
	$('.form-group').on('input','.prc',function(){
		var total =0;
		
			var inputVal=$(this).val();
			if($.isNumeric(inputVal)){
				total +=parseFloat(inputVal);
			}
	
		$('#total_qty').text(total);
	})
</script>