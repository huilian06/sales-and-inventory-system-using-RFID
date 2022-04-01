<?php
    session_start();
?>
<?php 
      if(!isset($_SESSION['username'])){
      header("Location:index.php"); } 
?>

<!DOCTYPE html>
<?php include("func_add_admin.php");?>
<?php include("func_edit_admin.php");?>
<html lang="en">
  <head>
<?php include("fixed.html");?>
 <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet"/>

      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
                    
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
           <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Welcome,<?php echo $_SESSION['username']; echo "!"; ?></h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Admin Management</a></li>
                            <li class="active">Home</li>
                        </ol>
                    </div>
                </div>
<div class="main">

  <div class="row">

   <div class="col-md-12 bg-light text-left">
  <div class="btn btn-primary" style="color:#337ab7" data-target='#addNewAdminModal' data-toggle='modal'role="button" class="btn btn-outline-primary">
                        New Admin
                    </div></div>

<!---
  <div class="col-sm-4">
   <label for="adminListPerPage">Show</label>
                        <select id="adminListPerPage" class="form-control">
                            <option value="1">1</option>
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> <label for="adminListPerPage">per page</label>
                       
                    </div>



  <div class="col-sm-4">
<label for="adminListSortBy" class="control-label">Sort by</label> 
                        <select id="adminListSortBy" class="form-control">
                            <option value="first_name-ASC" selected>Name (A to Z)</option>
                            <option value="first_name-DESC">Name (Z to A)</option>
                            <option value="created_on-ASC">Date Created (older first)</option>
                            <option value="created_on-DESC">Date Created (recent first)</option>
                            <option value="email-ASC">E-mail - ascending</option>
                            <option value="email-DESC">E-mail - descending</option>
                        </select>
                     </div>


    <div class="column">
                        <label for="adminSearch"><i class="fa fa-search"></i></label>
                        <input type="search" id="adminSearch" placeholder="Search...." class="form-control">
                    </div>


--->



<?php  
   include("db.php");
 $query ="SELECT * FROM admin_detail  ORDER BY admin_id DESC";  
 $result = mysqli_query($connect, $query)or die( mysqli_error($connect));  
?>  
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header text-center">
    <h1>
      ADMINISTRATOR ACCOUNTS
    </h1>
  
  </section>
         
           <div class="container-fluid" style="width:100%;top: 20px;"> 
                <div class="table-responsive" style="padding-top: 18px;">  
                     <table id="admin-table" class="w3-table-all w3-hoverable w3-card-4 w3-small">  
                          <thead>  
                               <tr class="w3-pale-red">  
                                    <th>ID</th>
                            <th>NAME</th>
                            <th>E-MAIL</th>
                            <th>MOBILE</th>
                            <th>ROLE</th>
                            <th>DATE CREATED</th>
                            <th>LAST LOG IN</th>
                            <th>EDIT</th>
                            <th>DELETE</th> 
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["admin_id"].'</td>
                                    <td>'.$row["first_name"].' '.$row["last_name"].'</td>  
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["phonenumber"].'</td>  
                                    <td>'.$row["role"].'</td> 
                                    <td>'.$row["date_created"].'</td> 
                                    <td>'.$row["last_login"].'</td> 
                                    
                                <td> <button><a href="edit_admin.php?edit='.$row["admin_id"].'"><i class="fa fa-pencil pointer"></i></a> </button> 
                                </td>

                               <td><a href="#" id="'.$row["admin_id"].'" class="delete"><i class="fa fa-trash pointer"></i></a></td>  </td>

                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div></div></div> 

</div>



</div>

 <hr>
            <!-- Header (sort order etc.) ends -->
            
            <!-- Admin list -->
            <div class="row">
                <div class="col-sm-12" id="allAdmin"></div>
            </div>
            <!-- Admin list ends -->
        </div>
    </div>
</div>
<!--- Modal to add new admin --->
<div class='modal fade' id='addNewAdminModal' role="dialog" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class='modal-header'>
                <button class="close" data-dismiss='modal'>&times;</button>
                <h4 class="text-center">Add New Admin</h4>
             <!---   <div class="text-center">
                    <i id="fMsgIcon"></i><span id="fMsg"></span>
                </div> --->
            </div>
            <div class="modal-body">
            
                <form action="func_add_admin.php" method="post" id='addNewAdminForm' name='addNewAdminForm' role='form'>
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control checkField" placeholder="First Name" required/>
                            <!--- <span class="help-block errMsg" id="firstNameErr"></span> --->
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control checkField" placeholder="Last Name" required/>
                            <!---<span class="help-block errMsg" id="lastNameErr"></span> --->
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control checkField" placeholder="Email" required/>
                            <!---<span class="help-block errMsg" id="emailErr"></span> --->
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label>Role</label>
                            <select class="form-control checkField" name="role" required/>
                                <option value=''>Role</option>
                                <option value='Owner'>Owner</option>
                                <option value='Admin'>Admin</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label>Phone Number</label>
                            <input type="int" name="phonenumber" class="form-control checkField" placeholder="Phone Number" required/>
                            <!---<span class="help-block errMsg" id="mobile1Err"></span> --->
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label>User Name</label>
                            <input type="text" name="username" class="form-control" placeholder="Username for login" required/>
                            <!---<span class="help-block errMsg" id="mobile2Err"></span> --->
                        </div>
                    </div>
             

                    <div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label>Password:</label>
                            <input type="password" class="form-control checkField" name="password" id="password" placeholder="Password" required/>
                           
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label>Retype Password:</label>
                            <input type="password" class="form-control checkField" name="confirmpassword" id="confirmpassword" placeholder="Retype Password" required/>
                            <!---<span class="help-block errMsg" id="passwordDupErr"></span>--->
                       

                        <div class="registrationFormAlert" style="color:green;" align="center" id="CheckPasswordMatch">
    <script>
    function checkPasswordMatch() {
        var password = $("#password").val();
        var confirmPassword = $("#confirmpassword").val();
        if (password != confirmPassword)
            $("#CheckPasswordMatch").html("✖ Passwords does not match!");
        else
            $("#CheckPasswordMatch").html("✔ Passwords match.");
    }
    $(document).ready(function () {
       $("#confirmpassword").keyup(checkPasswordMatch);
    });
    </script>
</div> </div>


                    </div>


						<div class="row">
                        <div class="form-group-sm col-sm-6">
                            <label>Created Time:</label>
                            <input type="text" name="date_created" value="<?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo date("Y-m-d, H:i:s"); ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group-sm col-sm-6">
                            <label>Admin ID:</label>
                            <input type="text" name="admin_id" id="id" style="color:white;background-color: #2ecc71;" value="<?php echo $adminid; ?>" class="form-control" readonly>
                        </div>

                    </div>

                 
                    


            <div class="modal-footer">
                <button type="reset" form="addNewAdminForm" class="btn btn-warning pull-left">Reset Form</button>
                <button type='submit' name="add_admin" class="btn btn-primary">Add Admin</button>
                <button type='button' class="btn btn-danger" data-dismiss='modal'>Close</button>
            </div>


                </form>
            </div>

            
        </div>
    </div>
</div>
</div>
<!--- end of modal to add new admin --->







<script>
   $(document).ready(function(){  
      $('#admin-table').DataTable();  
});
    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      if(confirm("Are you sure you want to remove this?"))
      {
        window.location.href="delete_admin.php?delete=1&id="+id;
      }
      else
      {
        return false;
      }
});


</script>
