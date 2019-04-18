<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add Holiday</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
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
                        <div class="col-lg-12">
                            <?php
                            $attributes = array("id"        => "addHolidayForm",
                                                "name"      => "addHolidayForm",
                                                "method"    => "post",
                                                "role"      => "form",
                                                "onSubmit"  => "return validateHolidayFrom();",
                                                "enctype"   => "multipart/form-data");

                            echo form_open("holiday/create_holiday", $attributes);
                            ?>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="form-group" id="sessionDiv">
                                            <label class="control-label">Choose Session</label>
                                            <select name="year" id="year" class="form-control">
                                                <option value="">select session</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="form-group" id="startDateDiv">
                                            <label class="control-label">Start Date</label>
                                            <input type="text" name="start_date" id="start_date" class="form-control" placeholder="Start Date" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="form-group" id="endDateDiv">
                                            <label class="control-label">End Date</label>
                                            <input type="text" name="end_date" id="end_date" class="form-control" placeholder="End Date" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8 col-xs-12">
                                        <div class="form-group" id="descriptionDiv">
                                            <label class="control-label">Purpose Of Holiday</label>
                                            <textarea class="form-control" rows="4" name="description" id="description" placeholder="Purpose Of Holiday"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="form-group" id="typeHolidayDiv">
                                            <label class="control-label">Type Of Holiday</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="typeOfHoliday" value="Normal"> Normal
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="typeOfHoliday" value="Emergency"> Emergency
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                                <a class="btn btn-danger" href="<?php echo site_url('holiday'); ?>">View List</a>
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

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $("#start_date").datepicker({
            minDate:new Date(),
            dateFormat: 'dd-mm-yy' 
        });
        $("#end_date").datepicker({
            minDate:new Date(),
            dateFormat: 'dd-mm-yy' 
        });
    });

    function validateHolidayFrom() {
        if($("#year").val() == "") {
            $("#sessionDiv").addClass("has-error");
            $("#year").focus();
            return false;
        }
        else {
            $("#sessionDiv").removeClass("has-error");
        }
        if($("#start_date").val() == "") {
            $("#startDateDiv").addClass("has-error");
            $("#start_date").focus();
            return false;
        }
        else {
            $("#startDateDiv").removeClass("has-error");
        }
        if($("#end_date").val() == "") {
            $("#endDateDiv").addClass("has-error");
            $("#end_date").focus();
            return false;
        }
        else {
            $("#endDateDiv").removeClass("has-error");
        }
        if($.trim($("#description").val()) == "") {
            $("#descriptionDiv").addClass("has-error");
            $("#description").focus();
            return false;
        }
        else {
            $("#descriptionDiv").removeClass("has-error");
        }
        if(!$("input:radio[name='typeOfHoliday']").is(":checked")) {
            $("#typeHolidayDiv").addClass("has-error");
            return false;
        }
        else {
            $("#typeHolidayDiv").removeClass("has-error");
        }

    }
</script>