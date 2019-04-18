<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update School Details</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <?php
            if(isset($message['success_message'])) {
            ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $message['success_message']; ?>
                </div>
            <?php
            }
            if(isset($message['error_message'])) {
            ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $message['error_message']; ?>
                </div>
            <?php
            }
            ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $attributes = array("id"        => "updateSchoolDetailsForm",
                                                "name"      => "updateSchoolDetailsForm",
                                                "method"    => "post",
                                                "role"      => "form",
                                                "enctype"   => "multipart/form-data");

                            echo form_open("update_school_details/update", $attributes);
                            ?>
                                <div class="form-group">
                                    <label>School Name</label>
                                    <input type="text" name="school_name" id="school_name" class="form-control" placeholder="School Name" value="<?php echo $school_details[0]->school_name; ?>">
                                </div>
                                <div class="form-group">
                                    <label>School Address</label>
                                    <textarea class="form-control" rows="4" name="school_address" id="school_address" placeholder="School Address"><?php echo $school_details[0]->school_address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-12">    
                                            <label>Logo <small>* gif|jpg|png|bmp only</small></label>
                                            <input type="file" name="school_logo" id="school_logo">
                                            <input type="hidden" name="prev_logo" value="<?php echo $school_details[0]->school_logo; ?>">
                                        </div>
                                        <div class="col-sm-8 col-xs-12"> 
                                            <img src="<?php echo base_url(); ?>uploads/logo/<?php echo $school_details[0]->school_logo; ?>" width="100">
                                        </div>    
                                    </div>    
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