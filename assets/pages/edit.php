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
if(isset($_POST['update'])) {  


    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $country = $_POST['country'];
	$state = $_POST['state'];
	$pincode = $_POST['pincode'];
	
$result = mysqli_query($connection, "UPDATE company SET name='$name',address='$address',country='$country',state='$state',pincode='$pincode' WHERE id='$id'");
        echo $result;
        //redirectig to the display page. In our case, it is index.php
        header("Location: company_list.php");
}
?>
<?php
//getting id from url
 $id = (isset($_GET['id']) ? $_GET['id'] : '');
echo $id;
//selecting data associated with this particular id
$result = mysqli_query($connection, "SELECT * FROM company WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
	//$id =$res['id'];
    $name = $res['name'];
    $address = $res['address'];
    $country = $res['country'];
	$state = $res['state'];
	$pincode = $res['pincode'];
}

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
          <h1 class="page-header">Blank</h1>
        </div>
      </div>
      <div class="row">
      
        <form method="post" action="edit.php">
        
          <div class="col-sm-6 col-xs-12">
            <div class="form-group">
            <input type="hidden" name="id" value=<?php echo (isset($_GET['id']) ? $_GET['id'] : '')?> >
              <label>Name</label>
              <input class="form-control" placeholder="Company Name" name="name" value="<?php echo $name;?>" required>
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea class="form-control" rows="5" name="address"  required ><?php echo $address;?></textarea>
            </div>
          </div>
          <div class="col-sm-6 col-xs-12">
            <div class="form-group">
              <label>Select Country</label>
              <select id="country" name="country" class="form-control" required >
                
              </select>
            </div>
            <div class="form-group">
              <label>Select State</label>
              <select name="state" id="state" class="form-control" value="<?php echo $state;?>" required >
               
              </select>
            </div>
            <div class="form-group">
              <label>Pin Code</label>
              <input class="form-control" placeholder="Pin Code" name="pincode" value="<?php echo $pincode?>" required >
            </div>
            <script language="javascript">
            populateCountries("country", "state");
            populateCountries("country2");
        </script> 
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <button type="submit" class="btn  btn-primary" name="update">Update</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.row --> 
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
</body>
</html>
