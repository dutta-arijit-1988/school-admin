<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Student List</h1>
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
            ?>
            <p><a class="btn btn-danger" href="<?php echo site_url('students/add_student'); ?>">Add Student</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
                    $attributes = array("id"        => "searchStudentForm",
                                        "name"      => "searchStudentForm",
                                        "method"    => "post",
                                        "role"      => "form",
                                        "enctype"   => "multipart/form-data");

                    echo form_open("students", $attributes);
                    ?>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="officialDetailsAcademicYearDiv">
                                    <label class="control-label">Academic Year</label>
                                    <select name="academic_year" id="academic_year" class="form-control">
                                        <option value="">select academic year</option>
                                        <option value="2018" <?php if(is_array($search_param) && isset($search_param['academic_year']) && $search_param['academic_year'] == '2018') echo 'selected="selected"'; ?>>2018</option>
                                        <option value="2019" <?php if(is_array($search_param) && isset($search_param['academic_year']) && $search_param['academic_year'] == '2019') echo 'selected="selected"'; ?>>2019</option>
                                    </select>
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
                                            <option value="<?php echo $i; ?>" <?php if(is_array($search_param) && isset($search_param['student_class']) && $search_param['student_class'] == $i) echo 'selected="selected"'; ?>><?php echo $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group" id="officialDetailsSectionDiv">
                                    <label class="control-label">Section</label>
                                    <select name="student_section" id="student_section" class="form-control">
                                        <?php
                                        if(is_array($search_param) && isset($search_param['student_section']) && $search_param['student_section'] != "") {
                                        ?>
                                            <option value="<?php echo $search_param['student_section']; ?>" selected="selected"><?php echo $search_param['student_section']; ?></option>
                                        <?php
                                        }
                                        else {
                                        ?>
                                            <option value="">select section</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-12">                            
                                <div class="form-group" id="officialDetailsFormNumberDiv">
                                    <label class="control-label">Student Name</label>
                                    <input type="text" name="student_name" id="student_name" class="form-control" placeholder="" value="<?php if(is_array($search_param) && isset($search_param['full_name']) && $search_param['full_name'] != "") echo $search_param['full_name']; ?>">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="btn_student_search" value="student_search" class="btn btn-primary">Search</button>
                        <?php
                        if(is_array($all_students) && sizeof($all_students) > 0) {
                        ?>
                            <a class="btn btn-success" href="#">Print</a>
                        <?php
                        }
                        ?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Form No.</th>
                                    <th>Roll No.</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(is_array($all_students) && sizeof($all_students) > 0) {
                                    $counter = 0;
                                    foreach ($all_students as $each_student) {
                                        $counter++;
                                ?>
                                        <tr class="<?=(($counter%2 == 0)?'even':'odd')?>">
                                            <td><?php echo $counter; ?></td>
                                            <td><?php echo $each_student->form_number; ?></td>
                                            <td><?php echo $each_student->roll_no; ?></td>
                                            <td><?php echo $each_student->full_name; ?></td>
                                            <td><?php echo $each_student->student_class; ?></td>
                                            <td><?php echo $each_student->student_section; ?></td>
                                            <td class="center">
                                                <a href="<?php echo site_url('students/edit_student/'.$each_student->id); ?>"><i class="fa fa-edit fa-fw"></i></a>
                                                <a href="<?php echo site_url('students/delete_student/'.$each_student->id); ?>"><i class="fa fa-trash-o fa-fw"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                else {
                                ?>
                                    <tr>
                                        <td colspan="7" align="center">No record</td>
                                    </tr>
                                <?php
                                }
                                ?>
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
    <!-- /.row -->
</div>

<script type="text/javascript">
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
</script>

<?php
if(is_array($all_students) && sizeof($all_students) > 0) {
?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                "responsive": true,
                //"paging": true,
                "ordering": false,
                //"info": true,
                "searching": false
            });
        });
    </script>
<?php
}
?>