
<?php
  include("database_connection.php");


?>
<!DOCTYPE html>
<html>
 <head>
 <?php include("fixed.html");?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
   
  <script type="text/javascript" src="./sales_order.js"></script>
 
</head>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 style="text-shadow:1px 1px 0 #444"class="page-title">Add New Sales Order</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Order</a></li>
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
          <form id="get_sales_order_data" onsubmit="return false">


                <div class="form-group">
                  <div class="col-md-4 col-xs-12 pull pull-right">
                  <input type="text" id="so_date_created" name="so_date_created" readonly class="form-control form-control-sm" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>
              

                <div class="col-md-4 col-xs-12 pull pull-left">

                  <div class="form-group">
                    <label class="col-sm-6 control-label" style="text-align:left;">Customer Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control form-control-sm" id="customer_name" name="customer_name" placeholder="Enter Customer Name" required/>
                    </div>
                  </div> 

                  <div class="form-group">
                    <label class="col-sm-7 control-label" style="text-align:left;">Customer Address</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control form-control-sm" id="customer_address" name="customer_address" placeholder="Enter Customer Address">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-6 control-label" style="text-align:left;">Customer Phone</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control form-control-sm" id="customer_phone" name="customer_phone" placeholder="Enter Customer Phone">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="gross_amount" class="col-sm-6 control-label" style="text-align:left;">Customer Email</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control form-control-sm" id="customer_email" name="customer_email" placeholder="Enter Customer Email">
                    </div>
                  </div>

                </div>
                
                <br>
               <br/>

     
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" >
      <tr>
        <th>#</th>
       <th style="width:50%">Product</th>
       <th style="width:10%">Qty In hand</th>
                      <th style="width:10%">Qty</th>
                      <th style="width:10%">Rate</th>
                      <th style="width:20%">Amount</th>
       <th> <button id="adds" class="btn btn-success btn-sm adds"><span class="glyphicon glyphicon-plus"></span></button>
      </tr>
        <tbody id="sales_invoice">
     </table>
      <br /> <br/>

                <div class="col-md-6 col-xs-12 pull pull-right">

                  <div class="form-group row">
                    <label for="sub_total" class="col-sm-5 col-form-label" align="right">Sub Total</label>
                      <div class="col-sm-7">
                        <input type="text" readonly name="sub_total" class="form-control form-control-sm" id="sub_total" required/>
                      </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="sst" class="col-sm-5 col-form-label" align="right">Service Charge (6%)</label>
                      <div class="col-sm-7">
                        <input type="text" readonly name="sst" class="form-control form-control-sm" id="sst" required/>
                      </div>
                  </div>
         
                 
                  <div class="form-group row">
                    <label for="discount" class="col-sm-5 col-form-label" align="right">Discount</label>
                      <div class="col-sm-7">
                        <input type="text" name="discount" class="form-control form-control-sm" id="discount" required/>
                      </div>
                  </div>
                  <div class="form-group row">
                   <label for="net_total" class="col-sm-5 col-form-label" align="right">Net Total</label>
                      <div class="col-sm-7">
                        <input type="text" readonly name="net_total" class="form-control form-control-sm" id="net_total" required/>
                      </div>
                  </div>


                <div class="form-group row">
                      <label for="payment_mode" class="col-sm-5 col-form-label" align="right">Payment Method</label>
                      <div class="col-sm-7">
                        <select name="payment_mode" class="form-control form-control-sm" id="payment_mode" required/>
                          <option>Cash</option>
                          <option>Card</option>
                          <option>Cheque</option>
                        </select>
                      </div>
                    </div>


                </div>
              </div>
              <!-- /.box-body -->
            </form>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- col-md-12 -->
    </div>
    <!-- /.row -->
     <div align="center">
       <input type="submit" id="sales_order_form" style="width:150px;" class="btn btn-info" value="Order">
     
                <a href="order.php" class="btn btn-warning">Back</a>
     </div>
    </div>
   </form>
  </div>
 </body>
</html>



<script>
$(document).ready(function(){
 

 
 $(document).on('click', '.remove_sales', function(){
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
</script>