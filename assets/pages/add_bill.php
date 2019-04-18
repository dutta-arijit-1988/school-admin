<?php

require('config.php');

// Initialize the session

session_start();

// If session variable is not set it will redirect to login page

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){

 // header("location: login.php");
echo "<script>window.location.href='login.php'</script>";
  exit;

}

?>
<!DOCTYPE html>
<html lang="en">
<?php

    // checking empty fields

       $result = mysqli_query($connection, "SELECT * FROM company ORDER BY id ASC");

	   $result1 = mysqli_query($connection, "SELECT * FROM company ORDER BY id ASC");

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
          <h1 class="page-header">Add Bill</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12"> <a href="view_bill.php">View Bill</a> </div>
        <br/>
        <br/>
      </div>
      
      
      
      <?php

if(isset($_POST['addbill'])) {  
	$company_id = $_POST['companyid'];
    $company_name = $_POST['companyname'];
    $date = $_POST['date'];
    $awb = $_POST['awb'];
	$destination = $_POST['destination'];
	$pcs = $_POST['pcs'];
	$weight = $_POST['weight'];
    $prd_type = $_POST['prd_type'];
	$amount = $_POST['amount'];

    // checking empty fields

        $result2 = mysqli_query($connection, "INSERT INTO bill (company_id,company_name,date,awb,destination,pcs,weight,prd_type,amount) VALUES('$company_id','$company_name',
'$date','$awb','$destination','$pcs','$weight','$prd_type','$amount')");
		
	//	echo $result2;
        //display success message
       echo "<script>alert('Data Added Successfully');</script>";
}

?>
      
      
      
      
      
      <div class="row">
        <form method="post">
          <div class="col-sm-9 col-xs-12">
            <div class="form-group">
              <select name="companyname" class="form-control">
                <?php while($res = mysqli_fetch_array($result)) {  ?>
                <option rel="<?php echo $res['name'] ?>" value="<?php echo $res['name'] ?>"><?php echo $res['name'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-sm-3 col-xs-12">
            <div class="form-group">
              <select name="companyid" class="cascade form-control vall" style="pointer-events:none;" >
                <?php while($res1 = mysqli_fetch_array($result1)) {  ?>
                <option  class="<?php echo $res1['name'] ?>" value="ss-<?php echo $res1['id'] ?>">ss-<?php echo $res1['id'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <br>
          <br>
          <hr>
          <br>
          <div style="min-height: 75px;">
          <div class="col-sm-4 col-xs-12">
            <div class="form-group">
              <label>Date</label>
              <input type = "text" id = "datepicker-13" required name="date" class="form-control" >
            </div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <label>AWB No</label>
            <input type = "text" required name="awb" class="form-control" >
          </div>
          <div class="col-sm-4 col-xs-12">
            <label>Destination</label>
            <input type = "text" required name="destination" class="form-control" >
          </div>
          </div>
         <div style="min-height: 75px;" >
          <div class="col-sm-4 col-xs-12">
            <label>Pcs</label>
            <input type = "text" required name="pcs" class="form-control" >
          </div>
          <div class="col-sm-4 col-xs-12">
            <label>Weight</label>
            <input type = "text" required name="weight" class="form-control" >
          </div>
          <div class="col-sm-4 col-xs-12">
            <label>Amount</label>
            <input type = "text" required name="amount" class="form-control" >
          </div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <label>PRD Type</label>
            <input type = "text" required name="prd_type" class="form-control" >
          </div>
          <div class="col-sm-4 col-xs-12"> <br/>
            <input type="submit" value="ADD BILL" name="addbill"  class="btn  btn-primary" >
          </div>
        </form>
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
<script>
$(document).ready(function(){

    var $cat = $('select[name=companyname]'),
        $items = $('select[name=companyid]');
		
    $cat.change(function(){
        var $this = $(this).find(':selected'),
            rel = $this.attr('rel'),
            $set = $items.find('option.' + rel);
        if ($set.size() < 0) {
            $items.hide();
            return;
        }
		
        $items.show().find('option').hide();
        $set.show().first().prop('selected', true);
    });
});
</script>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>

         $(function() {
            $( "#datepicker-13" ).datepicker({
				dateFormat:"yy-mm-dd"
			});

            $( "#datepicker-13" ).datepicker("hide");
         });
      </script>
</body>
</html>
