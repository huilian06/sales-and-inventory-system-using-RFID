
 <?php   
   include("db.php");
 function fill_supplier($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM supplier";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["supplier_id"].'">'.$row["supplier_name"].'</option>';  
      }  
      return $output;  
 }  
 function fill_phone($connect)  
 {  
      $output = '';  
      $sql = "SELECT supplier_phone FROM supplier";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
         
           $output .= '<value="">'.$row["supplier_phone"].'';  
      
      }  
      return $output;  
 }  
 ?>  
<!DOCTYPE html>
<html>
 <head>
  <?php include("fixed.html");?>
  <!---
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
   --->
  <script type="text/javascript" src="./po.js"></script>
</head>

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 style="text-shadow:1px 1px 0 #444"class="page-title">Add New Purchase Order</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="purchase_order.php">Purchase Order</a></li>
                            <li class="active">Home</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
<div class="overlay"><div class="loader"></div></div>
  <div class="main">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-12 col-xs-12">

        <div id="messages"></div>

        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3>
          </div>
          <!-- /.box-header -->
         <form id="get_purchase_order_data" onsubmit="return false">
              <div class="box-body">


                <div class="form-group">
                  <div class="col-md-4 col-xs-12 pull pull-right">
                  <input type="text" id="po_date_created" name="po_date_created" readonly class="form-control form-control-sm" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>

               <div class="form-group">
                    <label for="supplier_name" class="col-sm-6 control-label" style="text-align:left;">Supplier Name</label>
                    <div class="col-sm-5">
              
                      <select class="form-control form-control-sm" name="supplier_id" id="supplier_id">  
                          <option value="">Show All Supplier</option>  
                          <?php echo fill_supplier($connect); ?>  
                     </select>  
                     <br>
                    </div>
                  </div> 
                </div>
          
        
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered">
      <tr>
      <th>#</th>
       <th style="width:50%">Raw Materials</th>
                      <th style="width:10%">Qty In hand</th>
                      <th style="width:10%">Qty</th>
                      <th style="width:10%">Rate</th>
                      <th style="width:20%">Amount</th>
       <th> <button id="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button>
        
      </tr>
             <tbody id="invoice_item">
   
     </table>
      <br /> <br/>

               <div class="col-md-6 col-xs-12 pull pull-right">

                  <div class="form-group row">
                    <label for="po_sub_total" class="col-sm-5 col-form-label" align="right">Sub Total</label>
                      <div class="col-sm-7">
                        <input type="text" readonly name="po_sub_total" class="form-control form-control-sm" id="po_sub_total" required/>
                      </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="po_sst" class="col-sm-5 col-form-label" align="right">Service Charge (6%)</label>
                      <div class="col-sm-7">
                        <input type="text" readonly name="po_sst" class="form-control form-control-sm" id="po_sst" required/>
                      </div>
                  </div>
         
                 
                  <div class="form-group row">
                    <label for="po_discount" class="col-sm-5 col-form-label" align="right">Discount</label>
                      <div class="col-sm-7">
                        <input type="text" name="po_discount" class="form-control form-control-sm" id="po_discount" required/>
                      </div>
                  </div>
                  <div class="form-group row">
                   <label for="po_net_total" class="col-sm-5 col-form-label" align="right">Net Total</label>
                      <div class="col-sm-7">
                        <input type="text" readonly name="po_net_total" class="form-control form-control-sm" id="po_net_total" required/>
                      </div>
                  </div>

</div>
            </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
     <div align="center">
       <input type="submit" id="purchase_order_form" style="width:150px;" class="btn btn-info" value="Order">
                <a href="purchase_order.php" class="btn btn-warning">Back</a>
     </div>
    </div>
   </form>
  </div>
 </body>
</html>

<script>
 $(document).ready(function(){  
      $('#supplier_name').change(function(){  
           var supplier_id = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{supplier_id:supplier_id},  
                success:function(data){  
                     $('#show_phone').html(data);  
                }  
           });  
      });  
 }); 





$(document).ready(function(){
 

 
 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
 
 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
  $('.item_name').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_quantity').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Quantity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.item_unit').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#item_table').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});
</script>