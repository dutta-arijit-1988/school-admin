<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Holiday</h1>
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
            <p><a class="btn btn-danger" href="<?php echo site_url('holiday/add_holiday'); ?>">Add Holiday</a></p>
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
                                    <th>Year</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>No of Days</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(is_array($all_holidays) && sizeof($all_holidays) > 0) {
                                    $counter = 0;
                                    foreach ($all_holidays as $each_holiday) {
                                        $counter++;
                                ?>
                                        <tr class="<?=(($counter%2 == 0)?'even':'odd')?>">
                                            <td><?php echo $each_holiday->year; ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($each_holiday->start_date)); ?></td>
                                            <td><?php echo date("d-m-Y",strtotime($each_holiday->end_date)); ?></td>
                                            <td><?php echo $each_holiday->total_days; ?></td>
                                            <td class="center">
                                                <a href="<?php echo site_url('holiday/edit_holiday/'.$each_holiday->id); ?>"><i class="fa fa-edit fa-fw"></i></a>
                                                <a href="<?php echo site_url('holiday/delete_holiday/'.$each_holiday->id); ?>"><i class="fa fa-trash-o fa-fw"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                else {
                                ?>
                                    <tr>
                                        <td colspan="5" align="center">No record</td>
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

<?php
if(is_array($all_holidays) && sizeof($all_holidays) > 0) {
?>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                "responsive": true,
                //"paging": true,
                "ordering": false,
                //"info": true,
                //"searching": true
            });
        });
    </script>
<?php
}
?>