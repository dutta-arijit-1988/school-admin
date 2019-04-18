<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Student</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
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

            $attributes = array("id"        => "editStudentForm",
                                "name"      => "editStudentForm",
                                "method"    => "post",
                                "role"      => "form",
                                "onSubmit"  => "return validateStudentFrom();",
                                "enctype"   => "multipart/form-data");
            $hiddens = array("id" => $student_details[0]->id);            

            echo form_open("students/update_student", $attributes, $hiddens);
            ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        OFFICIAL DETAILS
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="officialDetailsAcademicYearDiv">
                                    <label class="control-label">Academic Year or Session</label>
                                    <select name="academic_year" id="academic_year" class="form-control">
                                        <option value="">select academic year or session</option>
                                        <option value="2018" <?php if($student_details[0]->academic_year == '2018') echo 'selected="selected"'; ?>>2018</option>
                                        <option value="2019" <?php if($student_details[0]->academic_year == '2019') echo 'selected="selected"'; ?>>2019</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="officialDetailsFormNumberDiv">
                                    <label class="control-label">Form Number</label>
                                    <input type="text" name="form_number" id="form_number" class="form-control" placeholder="" value="<?php echo $student_details[0]->form_number; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="officialDetailsClassDiv">
                                    <label class="control-label">Class</label>
                                    <select name="student_class" id="student_class" class="form-control" onchange="getSection(this);">
                                        <option value="">select class</option>
                                        <?php
                                        for ($i=1; $i <= 12; $i++) { 
                                        ?>
                                            <option value="<?php echo $i; ?>" <?php if($student_details[0]->student_class == $i) echo 'selected="selected"'; ?>><?php echo $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="officialDetailsSectionDiv">
                                    <label class="control-label">Section</label>
                                    <select name="student_section" id="student_section" class="form-control">
                                        <option value="<?php echo $student_details[0]->student_section; ?>" selected="selected"><?php echo $student_details[0]->student_section; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="officialDetailsJoiningDateDiv">
                                    <label class="control-label">Joining Date</label>
                                    <input type="text" name="joining_date" id="joining_date" class="form-control" placeholder="" value="<?php echo date("d-m-Y",strtotime($student_details[0]->joining_date)); ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="officialDetailsRollNoDiv">
                                    <label class="control-label">Roll No.</label>
                                    <input type="text" name="roll_no" id="roll_no" class="form-control" placeholder="" value="<?php echo $student_details[0]->roll_no; ?>" onkeypress="return validateFloatKeyPress(this,event);">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        PERSONAL DETAILS
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="personalDetailsFirstNameDiv">
                                    <label class="control-label">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="" value="<?php echo $student_details[0]->first_name; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="personalDetailsMiddleNameDiv">
                                    <label class="control-label">Middle Name</label>
                                    <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="" value="<?php echo $student_details[0]->middle_name; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="personalDetailsLastNameDiv">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="" value="<?php echo $student_details[0]->last_name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="personalDetailsDateOfBirthDiv">
                                    <label class="control-label">Date Of Birth</label>
                                    <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="" value="<?php echo date("d-m-Y",strtotime($student_details[0]->date_of_birth)); ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="personalDetailsGenderDiv">
                                    <label class="control-label">Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">select gender</option>
                                        <option value="Male" <?php if($student_details[0]->gender == 'Male') echo 'selected="selected"'; ?>>Male</option>
                                        <option value="Female" <?php if($student_details[0]->gender == 'Female') echo 'selected="selected"'; ?>>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="personalDetailsBloodGroupDiv">
                                    <label class="control-label">Blood Group</label>
                                    <select name="blood_group" id="blood_group" class="form-control">
                                        <option value="">select blood group</option>
                                        <option value="A+" <?php if($student_details[0]->blood_group == 'A+') echo 'selected="selected"'; ?>>A+</option>
                                        <option value="A-" <?php if($student_details[0]->blood_group == 'A-') echo 'selected="selected"'; ?>>A-</option>
                                        <option value="B+" <?php if($student_details[0]->blood_group == 'B+') echo 'selected="selected"'; ?>>B+</option>
                                        <option value="B-" <?php if($student_details[0]->blood_group == 'B-') echo 'selected="selected"'; ?>>B-</option>
                                        <option value="O+" <?php if($student_details[0]->blood_group == 'O+') echo 'selected="selected"'; ?>>O+</option>
                                        <option value="O-" <?php if($student_details[0]->blood_group == 'O-') echo 'selected="selected"'; ?>>O-</option>
                                        <option value="AB+" <?php if($student_details[0]->blood_group == 'AB+') echo 'selected="selected"'; ?>>AB+</option>
                                        <option value="AB-" <?php if($student_details[0]->blood_group == 'AB-') echo 'selected="selected"'; ?>>AB-</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="personalDetailsBirthPlaceDiv">
                                    <label class="control-label">Birth Place</label>
                                    <input type="text" name="birth_place" id="birth_place" class="form-control" placeholder="" value="<?php echo $student_details[0]->birth_place; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="personalDetailsNationalityDiv">
                                    <label class="control-label">Nationality</label>
                                    <input type="text" name="nationality" id="nationality" class="form-control" placeholder="" value="<?php echo $student_details[0]->nationality; ?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="personalDetailsMotherTongueDiv">
                                    <label class="control-label">Mother Tongue</label>
                                    <input type="text" name="mother_tongue" id="mother_tongue" class="form-control" placeholder="" value="<?php echo $student_details[0]->mother_tongue; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="personalDetailsCategoryDiv">
                                    <label class="control-label">Category</label>
                                    <input type="text" name="category" id="category" class="form-control" placeholder="" value="<?php echo $student_details[0]->category; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="personalDetailsReligionDiv">
                                    <label class="control-label">Religion</label>
                                    <input type="text" name="religion" id="religion" class="form-control" placeholder="" value="<?php echo $student_details[0]->religion; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="personalDetailsAadharNumberDiv">
                                    <label class="control-label">Aadhar Number</label>
                                    <input type="text" name="aadhar_number" id="aadhar_number" class="form-control" placeholder="" value="<?php echo $student_details[0]->aadhar_number; ?>" onkeypress="return validateFloatKeyPress(this,event);">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        CONTACT DETAILS
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group" id="contactDetailsPermanentAddressDiv">
                                    <label class="control-label">Permanent Address</label>
                                    <textarea class="form-control" rows="4" name="permanent_address" id="permanent_address" placeholder=""><?php echo $student_details[0]->permanent_address; ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group" id="contactDetailsPresentAddressDiv">
                                    <label class="control-label">Present Address</label>
                                    <textarea class="form-control" rows="4" name="present_address" id="present_address" placeholder=""><?php echo $student_details[0]->present_address; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="contactDetailsCityDiv">
                                    <label class="control-label">City</label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="" value="<?php echo $student_details[0]->city; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="contactDetailsPincodeDiv">
                                    <label class="control-label">Pincode</label>
                                    <input type="text" name="pincode" id="pincode" class="form-control" placeholder="" value="<?php echo $student_details[0]->pincode; ?>" onkeypress="return validateFloatKeyPress(this,event);">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="contactDetailsMobileDiv">
                                    <label class="control-label">Mobile</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="" value="<?php echo $student_details[0]->mobile; ?>" onkeypress="return validateFloatKeyPress(this,event);">
                                </div>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="contactDetailsEmailDiv">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="" value="<?php echo $student_details[0]->email; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        FATHER'S DETAILS
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="fatherDetailsNameDiv">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="father_name" id="father_name" class="form-control" placeholder="" value="<?php echo $student_details[0]->father_name; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="fatherDetailsMobileDiv">
                                    <label class="control-label">Mobile</label>
                                    <input type="text" name="father_mobile" id="father_mobile" class="form-control" placeholder="" value="<?php echo $student_details[0]->father_mobile; ?>" onkeypress="return validateFloatKeyPress(this,event);">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="fatherDetailsJobDiv">
                                    <label class="control-label">Job</label>
                                    <input type="text" name="father_job" id="father_job" class="form-control" placeholder="" value="<?php echo $student_details[0]->father_job; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="fatherDetailsAadharNumberDiv">
                                    <label class="control-label">Aadhar Number</label>
                                    <input type="text" name="father_aadhar_number" id="father_aadhar_number" class="form-control" placeholder="" onkeypress="return validateFloatKeyPress(this,event);" value="<?php echo $student_details[0]->father_aadhar_number; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="fatherDetailsQualificationDiv">
                                    <label class="control-label">Qualification</label>
                                    <input type="text" name="father_qualification" id="father_qualification" class="form-control" placeholder="" value="<?php echo $student_details[0]->father_qualification; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        MOTHER'S DETAILS
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="motherDetailsNameDiv">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="mother_name" id="mother_name" class="form-control" placeholder="" value="<?php echo $student_details[0]->mother_name; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="motherDetailsMobileDiv">
                                    <label class="control-label">Mobile</label>
                                    <input type="text" name="mother_mobile" id="mother_mobile" class="form-control" placeholder="" value="<?php echo $student_details[0]->mother_mobile; ?>" onkeypress="return validateFloatKeyPress(this,event);">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="motherDetailsJobDiv">
                                    <label class="control-label">Job</label>
                                    <input type="text" name="mother_job" id="mother_job" class="form-control" placeholder="" value="<?php echo $student_details[0]->mother_job; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="motherDetailsAadharNumberDiv">
                                    <label class="control-label">Aadhar Number</label>
                                    <input type="text" name="mother_aadhar_number" id="mother_aadhar_number" class="form-control" placeholder="" onkeypress="return validateFloatKeyPress(this,event);" value="<?php echo $student_details[0]->mother_aadhar_number; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="motherDetailsQualificationDiv">
                                    <label class="control-label">Qualification</label>
                                    <input type="text" name="mother_qualification" id="mother_qualification" class="form-control" placeholder="" value="<?php echo $student_details[0]->mother_qualification; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        OTHER DETAILS
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group" id="otherDetailsRemarksDiv">
                                    <label class="control-label">Remarks</label>
                                    <textarea class="form-control" rows="4" name="remarks" id="remarks" placeholder=""><?php echo $student_details[0]->remarks; ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group" id="otherDetailsTotalFeesDiv">
                                            <label class="control-label">Total Fees</label>
                                            <input type="text" name="total_fees" id="total_fees" class="form-control" placeholder="" value="<?php echo $student_details[0]->total_fees; ?>" onkeypress="return validateFloatKeyPress(this,event);">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-group" id="otherDetailsAdmissionByDiv">
                                            <label class="control-label">Admission By</label>
                                            <input type="text" name="admission_by" id="admission_by" class="form-control" placeholder="" value="<?php echo $student_details[0]->admission_by; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                                
                        <button type="submit" class="btn btn-default">Update</button>
                        <a class="btn btn-danger" href="<?php echo site_url('students'); ?>">View List</a>
                        <a class="btn btn-primary" href="#">Print</a>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $( function() {
        $("#joining_date").datepicker({
            dateFormat: 'dd-mm-yy' 
        });
        $("#date_of_birth").datepicker({
            dateFormat: 'dd-mm-yy' 
        });
    });

    function getSection(obj) {
        var stdClass = $(obj).val();
        jQuery.ajax({
            type: "POST",
            url: "<?php echo base_url();?>index.php/students/get_section/"+stdClass,
            dataType: 'html',
            success: function(data) {
                //alert(data);
                if(data) {
                    $("#student_section").html(data);
                }
            }
        });
    }

    function validateStudentFrom() {
        if($("#academic_year").val() == "") {
            $("#officialDetailsAcademicYearDiv").addClass("has-error");
            $("#academic_year").focus();
            return false;
        }
        else {
            $("#officialDetailsAcademicYearDiv").removeClass("has-error");
        }
        if($("#form_number").val() == "") {
            $("#officialDetailsFormNumberDiv").addClass("has-error");
            $("#form_number").focus();
            return false;
        }
        else {
            $("#officialDetailsFormNumberDiv").removeClass("has-error");
        }
        if($("#student_class").val() == "") {
            $("#officialDetailsClassDiv").addClass("has-error");
            $("#student_class").focus();
            return false;
        }
        else {
            $("#officialDetailsClassDiv").removeClass("has-error");
        }
        if($("#student_section").val() == "") {
            $("#officialDetailsSectionDiv").addClass("has-error");
            $("#student_section").focus();
            return false;
        }
        else {
            $("#officialDetailsSectionDiv").removeClass("has-error");
        }
        if($("#joining_date").val() == "") {
            $("#officialDetailsJoiningDateDiv").addClass("has-error");
            $("#joining_date").focus();
            return false;
        }
        else {
            $("#officialDetailsJoiningDateDiv").removeClass("has-error");
        }
        if($("#roll_no").val() == "") {
            $("#officialDetailsRollNoDiv").addClass("has-error");
            $("#roll_no").focus();
            return false;
        }
        else {
            $("#officialDetailsRollNoDiv").removeClass("has-error");
        }
        if($("#first_name").val() == "") {
            $("#personalDetailsFirstNameDiv").addClass("has-error");
            $("#first_name").focus();
            return false;
        }
        else {
            $("#personalDetailsFirstNameDiv").removeClass("has-error");
        }
        if($("#last_name").val() == "") {
            $("#personalDetailsLastNameDiv").addClass("has-error");
            $("#last_name").focus();
            return false;
        }
        else {
            $("#personalDetailsLastNameDiv").removeClass("has-error");
        }
        if($("#date_of_birth").val() == "") {
            $("#personalDetailsDateOfBirthDiv").addClass("has-error");
            $("#date_of_birth").focus();
            return false;
        }
        else {
            $("#personalDetailsDateOfBirthDiv").removeClass("has-error");
        }
        if($("#gender").val() == "") {
            $("#personalDetailsGenderDiv").addClass("has-error");
            $("#gender").focus();
            return false;
        }
        else {
            $("#personalDetailsGenderDiv").removeClass("has-error");
        }
        if($("#aadhar_number").val() == "") {
            $("#personalDetailsAadharNumberDiv").addClass("has-error");
            $("#aadhar_number").focus();
            return false;
        }
        else {
            $("#personalDetailsAadharNumberDiv").removeClass("has-error");
        }
        if($("#permanent_address").val() == "") {
            $("#contactDetailsPermanentAddressDiv").addClass("has-error");
            $("#permanent_address").focus();
            return false;
        }
        else {
            $("#contactDetailsPermanentAddressDiv").removeClass("has-error");
        }
        if($("#present_address").val() == "") {
            $("#contactDetailsPresentAddressDiv").addClass("has-error");
            $("#present_address").focus();
            return false;
        }
        else {
            $("#contactDetailsPresentAddressDiv").removeClass("has-error");
        }
        if($("#city").val() == "") {
            $("#contactDetailsCityDiv").addClass("has-error");
            $("#city").focus();
            return false;
        }
        else {
            $("#contactDetailsCityDiv").removeClass("has-error");
        }
        if($("#pincode").val() == "") {
            $("#contactDetailsPincodeDiv").addClass("has-error");
            $("#pincode").focus();
            return false;
        }
        else {
            $("#contactDetailsPincodeDiv").removeClass("has-error");
        }
        if($("#mobile").val() == "") {
            $("#contactDetailsMobileDiv").addClass("has-error");
            $("#mobile").focus();
            return false;
        }
        else {
            $("#contactDetailsMobileDiv").removeClass("has-error");
        }
        if($("#email").val() != "") {
            var email = $("#email").val();
            if(validateEmail(email)) {
                $("#contactDetailsEmailDiv").removeClass("has-error");
            }
            else {
                $("#contactDetailsEmailDiv").addClass("has-error");
                $("#email").focus();
                return false;
            }
        }
        if($("#father_name").val() == "") {
            $("#fatherDetailsNameDiv").addClass("has-error");
            $("#father_name").focus();
            return false;
        }
        else {
            $("#fatherDetailsNameDiv").removeClass("has-error");
        }
        if($("#father_mobile").val() == "") {
            $("#fatherDetailsMobileDiv").addClass("has-error");
            $("#father_mobile").focus();
            return false;
        }
        else {
            $("#fatherDetailsMobileDiv").removeClass("has-error");
        }
        if($("#father_job").val() == "") {
            $("#fatherDetailsJobDiv").addClass("has-error");
            $("#father_job").focus();
            return false;
        }
        else {
            $("#fatherDetailsJobDiv").removeClass("has-error");
        }
        if($("#father_aadhar_number").val() == "") {
            $("#fatherDetailsAadharNumberDiv").addClass("has-error");
            $("#father_aadhar_number").focus();
            return false;
        }
        else {
            $("#fatherDetailsAadharNumberDiv").removeClass("has-error");
        }
        if($("#mother_name").val() == "") {
            $("#motherDetailsNameDiv").addClass("has-error");
            $("#mother_name").focus();
            return false;
        }
        else {
            $("#motherDetailsNameDiv").removeClass("has-error");
        }
        if($("#mother_aadhar_number").val() == "") {
            $("#motherDetailsAadharNumberDiv").addClass("has-error");
            $("#mother_aadhar_number").focus();
            return false;
        }
        else {
            $("#motherDetailsAadharNumberDiv").removeClass("has-error");
        }
        if($("#total_fees").val() == "") {
            $("#otherDetailsTotalFeesDiv").addClass("has-error");
            $("#total_fees").focus();
            return false;
        }
        else {
            $("#otherDetailsTotalFeesDiv").removeClass("has-error");
        }
        if($("#admission_by").val() == "") {
            $("#otherDetailsAdmissionByDiv").addClass("has-error");
            $("#admission_by").focus();
            return false;
        }
        else {
            $("#otherDetailsAdmissionByDiv").removeClass("has-error");
        }
        /*if(!$("input:radio[name='typeOfHoliday']").is(":checked")) {
            $("#typeHolidayDiv").addClass("has-error");
            return false;
        }
        else {
            $("#typeHolidayDiv").removeClass("has-error");
        }*/
    }

    function validateEmail(email) {
        var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return regex.test(String(email).toLowerCase());
    }

    function validateFloatKeyPress(el, evt) {
       
        var charCode = (evt.which) ? evt.which : event.keyCode;
        var number = el.value.split('.');
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        //just one dot
        if(number.length>1 && charCode == 46){
             return false;
        }
        //get the carat position
        var caratPos = getSelectionStart(el);
        var dotPos = el.value.indexOf(".");
        if( caratPos > dotPos && dotPos>-1 && (number[1].length > 1)){
            return false;
        }
        return true;
    }

    //thanks: http://javascript.nwbox.com/cursor_position/
    function getSelectionStart(o) {
        if (o.createTextRange) {
            var r = document.selection.createRange().duplicate()
            r.moveEnd('character', o.value.length)
            if (r.text == '') return o.value.length
            return o.value.lastIndexOf(r.text)
        } else return o.selectionStart
    }
</script>