<?php include('includes/header.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 ">
                    <h1 class="page-header">My Appointment History</h1>
                </div>
                <div class="clearfix"></div>
                <div>
                <?php if (isset($_SESSION['msg'])): ?>
                        <div class="alert alert-warning">
                            <?php echo $_SESSION['msg']; ?>
                        </div>
                        <?php  unset($_SESSION["msg"]); endif;
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            My Appoint History
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>

                                        <th>Doctor Name</th>
                                        <th>Appointment Date</th>
                                        <th>Patient Name</th>
                                        <th>Serial Number</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    /** Get Appointment History            
                                     */
                                    $appoint_history=all_appoint_history();
                                    foreach ($appoint_history as $appoints): ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo $appoints['fullname']?></td>
                                        <td><?php echo $appoints['appoint_date']?></td>
                                        <td><?php echo $appoints['patient_name']?></td>
                                        <td><?php echo $appoints['patient_serial']?></td>
                                        <td><?php 
                                        if($appoints['approved']==1){
                                            echo "Approved";
                                        }else{
                                            echo 'Not Approved';
                                        }?></td>                                        
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

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
