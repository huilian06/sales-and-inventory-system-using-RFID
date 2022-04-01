<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php 
     // if(!isset($_SESSION['username'])){
     // header("Location:index.php"); } 
?>


<!DOCTYPE html>
<html lang="en">
<?php include("fixed.html");?>
<head>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<style>
 div.card {
  box-shadow: 5px 5px 5px grey;
}

 div.white-box {
  box-shadow: 5px 5px 5px grey;
}

.zoom {
  padding: 0px;
  transition: transform .2s;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.05); /* IE 9 */
  -webkit-transform: scale(1.05); /* Safari 3-8 */
  transform: scale(1.05); 
}
</style>

<body>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Welcome,<?php echo $_SESSION['username']; echo "!"; ?></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Home</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>


                <!-- /.row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">

                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"><i class="fa fa-archive"></i>
                                            <h5 class="text-muted vb">To Be Packed</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-danger">
                                              <?php 
      include("db.php"); 
 $query ="SELECT * FROM sale_order WHERE so_status=0 ";  
 $result = mysqli_query($connect, $query)or die( mysqli_error($connect));  
 $row = mysqli_num_rows($result);
 echo '<h1>'.$row.'</h1>';
      ?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                           <a href="so_placed.php" class="card-link"><h5>View</h5></a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="fa fa-cubes"></i>
                                            <h5 class="text-muted vb">To Be Ship</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-megna"> <?php 
       include("db.php");
 $query ="SELECT * FROM sale_order WHERE so_status=1 ";  
 $result = mysqli_query($connect, $query)or die( mysqli_error($connect));  
 $row = mysqli_num_rows($result);
 echo '<h1>'.$row.'</h1>';
      ?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                           <a href="so_packed.php"class="card-link"><h5>View</h5></a></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class=" fa fa-truck" ></i>
                                            <h5 class="text-muted vb">To Be Delivered</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-primary"> <?php 
         include("db.php"); 
 $query ="SELECT * FROM sale_order WHERE so_status=2 ";  
 $result = mysqli_query($connect, $query)or die( mysqli_error($connect));  
 $row = mysqli_num_rows($result);
 echo '<h1>'.$row.'</h1>';
      ?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <a href="so_shipped.php" class="card-link"><h5>View</h5></a>
                                            </div>
                                        </div>
                                    </div>
                                


                                <div class="col-lg-3 col-sm-6  b-0">
                                    <div class="col-in row">
                                        <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                                            <h5 class="text-muted vb">To Be Invoiced</h5> </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <h3 class="counter text-right m-t-15 text-success"><?php 
        include("db.php"); 
 $query ="SELECT * FROM sale_order WHERE so_status=3 ";  
 $result = mysqli_query($connect, $query)or die( mysqli_error($connect));  
 $row = mysqli_num_rows($result);
 echo '<h1>'.$row.'</h1>';
      ?></h3> </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <a href="so_delivered.php" class="card-link"><h5>View</h5></a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!--row -->
             
                <div class="row">

                    <div class="col-md-12 col-lg-5 col-sm-12 zoom">
                        <div class="white-box">
                            <h3 class="box-title">Low Stock Item</h3>
                            <div class="comment-center">
                                <div class="comment-body">
                                    <div class="mail-contnet">
                                     <ul class="list-group list-group-flush">
                                      <span class="badge bg-danger">
    <li class="list-group-item" data-toggle="modal" data-target="#myModal"> <p><a href="#" class="text-danger"><h4><span class="glyphicon glyphicon-pushpin mr-2" ></span>Raw Material</h4></a></p></li></span>
     <br>
    <span class="badge bg-danger">
    <li class="list-group-item" data-toggle="modal" data-target="#myModalproduct"> <p><a href="#" class="text-danger"><h4><span class="glyphicon glyphicon-pushpin mr-2"></span>Products</h4></a></p></li></span>
    
  </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 col-lg-6 col-sm-12 zoom">
                        <div class="white-box">
                          <h3 class="box-title">Purchase Order</h3>
                            
                            <ul class="card-body">
    <li class="list-group-item text-center"> <a href="po_placed.php"><h5>Purchase Order To Be Received</h5>
      <?php 
        include("db.php"); 
 $query ="SELECT * FROM purchase_order WHERE po_status=0 ";  
 $result = mysqli_query($connect, $query)or die( mysqli_error($connect));  
 $row = mysqli_num_rows($result);
 echo '<h1 class="text-warning">'.$row.'</h1>';
      ?>
</p></a></li>

    <li class="list-group-item text-center">  <a href="#"> <h5> Order Cost
      <br>
      <br>
      RM
      <?php  include("db.php");
 $query ="SELECT SUM(po_net_total) AS sum FROM purchase_order WHERE po_status=0 ";  
 $result = mysqli_query($connect, $query)or die( mysqli_error($connect));  
 $row = mysqli_num_rows($result);
 while ($row=mysqli_fetch_assoc($result)) {
    echo number_format($row['sum'],2);
   # '<h3>'.$row['sum'].'</h3>';
 }

      ?> </h4> </a></li></p>
  </ul>
</div></div></div>

  <?php  
  include("db.php");
 $query ="SELECT product_name,qty, COUNT(product_name) AS total, SUM(qty) AS s FROM sales_order_detail GROUP BY product_name ORDER BY s DESC LIMIT 3";  
 $result = mysqli_query($connect, $query)or die( mysqli_error($connect));  
 
 
?>  



<div class="row">
  <div class="col">
<div class='card bg-secondary mb-4 zoom' style='max-width: 50rem';>
  <div class='card-header'>
    <h3><p class="text-center font-weight-bold">TOP 3 PRODUCT</p></h3></div>
<br>
<table class="w3-table-all w3-card-4" style="width:90%" align="center">
  <thead>
    <tr class="table-success">
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Total Quantity Sold</th>
    </tr>
  </thead>
  <tbody>
     
         <?php  
         $no=1;
         while($row = mysqli_fetch_array($result))  
{ 
                                  echo ' <tr>
                                <td>' . $no. '</td>
                                  <td>' . $row['product_name'] . '</td>
                                  <td>'.$row['s'].'</td> ';
                              $no ++;
                            }
                            ?>
                               
    </tr>
   
  </tbody>
</table>
<br>
</div></div>

<div class="col">
<div class='card zoom' style='max-width: 50rem';>
<div class="text-right">
    <h2><p class="badge bg-success"> <?php

echo date("M");

?></p></h2></div>
  
<?php include("pie_chart.php");?></div></div></div>

                        </div>
                    </div>
                
                <!-- /.row -->








<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Low Stock Raw Materials</h4>
        </div>
        <div class="modal-body">
<table id="low_inventory_list" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Image</th>
                <th>Inventory ID</th>
                <th>Inventory Name</th>
                <th>Price</th>
                <th>Quantity</th>
 
              </tr>
              </thead>


          <?php
            include("db.php"); 
 $query ="SELECT * FROM inventory  WHERE inventory_quantity <10 ";  
 $result = mysqli_query($connect, $query)or die( mysqli_error($connect));  
   while($row = mysqli_fetch_array($result))  
      {  
 echo'        
            
           <tr> 
           <td><img src="images/'. $row["inventory_image"].'" style="width:60px;height:60px"></td>

           <td>'.$row['inventory_id'].'</td>  
         
                                    <td>'.$row["inventory_name"].'</td>
                                    <td>'.$row["inventory_price"].'</td>  
                                    <td>'.$row["inventory_quantity"].'</td> 
                                    
              

                               ';  
   }
?>                         


         </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  

 <!-- Modal -->
  <div class="modal fade" id="myModalproduct" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Low Stock Product</h4>
        </div>
        <div class="modal-body">
<table id="low_product_list" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Image</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
 
              </tr>
              </thead>


          <?php
         include("db.php");
 $query ="SELECT * FROM product  WHERE product_quantity <10 ";  
 $result = mysqli_query($connect, $query)or die( mysqli_error($connect));  
   while($row = mysqli_fetch_array($result))  
      {  
 echo'        
            
           <tr> 
           <td><img src="images/'. $row["product_image"].'" style="width:60px;height:60px"></td>

           <td>'.$row['product_id'].'</td>  
         
                                    <td>'.$row["product_name"].'</td>
                                    <td>'.$row["product_price"].'</td>  
                                    <td>'.$row["product_quantity"].'</td> 
                                    
                                    
              

                               ';  
   }
?>                         


         </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul>
                                <li><b>Layout Options</b></li>
                                <li>
                                    <div class="checkbox checkbox-info">
                                        <input id="checkbox1" type="checkbox" class="fxhdr">
                                        <label for="checkbox1"> Fix Header </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-warning">
                                        <input id="checkbox2" type="checkbox" class="fxsdr">
                                        <label for="checkbox2"> Fix Sidebar </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox4" type="checkbox" class="open-close">
                                        <label for="checkbox4"> Toggle Sidebar </label>
                                    </div>
                                </li>
                            </ul>
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" theme="gray" class="yellow-theme">3</a></li>
                                <li><a href="javascript:void(0)" theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" theme="megna" class="megna-theme">6</a></li>
                                <li><b>With Dark sidebar</b></li>
                                <br/>
                                <li><a href="javascript:void(0)" theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" theme="megna-dark" class="megna-dark-theme">12</a></li>
                            </ul>
                           
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2021 &copy; Hup Seng Aluminium Glass </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Counter js -->
    <script src="../plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="../plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="../plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Welcome to Admin Portal',
            text: 'view, edit and create to keep your users engaged.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3700,
            stack: 6
        })
    });
    </script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>