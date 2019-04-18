<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

	<head>

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>Login</title>

	    <!-- Bootstrap Core CSS -->
	    <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	    <!-- MetisMenu CSS -->
	    <link href="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	    <!-- Custom CSS -->
	    <link href="<?php echo base_url(); ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

	    <!-- Custom Fonts -->
	    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->

	</head>

	<body>

	    <div class="container">
	        <div class="row">
	            <div class="col-md-4 col-md-offset-4">
	                <div class="login-panel panel panel-default">
	                    <div class="panel-heading">
	                        <h3 class="panel-title">Please Sign In</h3>
	                    </div>
	                    <?php
						if(isset($error_message)) {
						?>
							<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $error_message; ?>
                            </div>
						<?php
						}
						?>
	                    <div class="panel-body">
	                    	<?php
							$attributes = array("id" 		=> "loginform",
												"name" 		=> "loginform", 
												"class" 	=> "form-signin", 
												"method" 	=> "post");

		          			echo form_open("login/logincheck", $attributes);
		          			?>
								<h2 class="form-signin-heading">Please Login</h2>
								<label for="inputUsername" class="sr-only">Username</label>
								<input type="text" name="username" id="username" class="form-control" placeholder="Username">
								<br/>
								<label for="inputPassword" class="sr-only">Password</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Password">
								<br/>
								<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
								<!-- <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a> -->
							<?php echo form_close(); ?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	    <!-- jQuery -->
	    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

	    <!-- Bootstrap Core JavaScript -->
	    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	    <!-- Metis Menu Plugin JavaScript -->
	    <script src="<?php echo base_url(); ?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

	    <!-- Custom Theme JavaScript -->
	    <script src="<?php echo base_url(); ?>assets/dist/js/sb-admin-2.js"></script>

	</body>

</html>