<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Change Password</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <?php
            if(isset($success_message)) {
            ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $success_message; ?>
                </div>
            <?php
            }
            if(isset($error_message)) {
            ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $error_message; ?>
                </div>
            <?php
            }
            ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php
                            $attributes = array("id"        => "updatePasswordForm",
                                                "name"      => "updatePasswordForm",
                                                "method"    => "post",
                                                "role"      => "form");

                            echo form_open("change_password/update", $attributes);
                            ?>
                                <div class="form-group">
                                    <label>Type Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                </div>                                
                                <button type="submit" class="btn btn-default">Update</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>