<?php
require('config.php');
// Initialize the session
session_start();
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php




	
        
    // checking empty fields
       $result = mysqli_query($connection, "SELECT * FROM company ORDER BY id DESC");
	   
	   

?>

<?php include 'header.php';?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'navigation.php';?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
             
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="company.php">ADD NEW</a>
                    </div>
                    <br/>
                </div>
                
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List  Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>SL No</th>
                                            <th>Company Name</th>
                                            <th>Address</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>Pin Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php while($res = mysqli_fetch_array($result)) {  ?>
                                        <tr class="odd">
                                            <td><?php echo $res['id'] ?></td>
                                            <td><?php echo $res['name'] ?></td>
                                            <td><?php echo  $res['address'] ?></td>
                                            <td class="center"><?php echo $res['country'] ?></td>
                                            <td class="center"><?php echo $res['state'] ?></td>
                                            <td class="center"><?php echo $res['pincode'] ?></td>
                                    <?php
                                            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; ?>
                                         
                                        </tr>
                                     <?php } ?>   
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
     <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

    

</body>

</html>
