<?php include('includes/header.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 ">
                    <h1 class="page-header">Doctors</h1>
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
                            Doctor Lists
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Information</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        <?php
                                    /** Get all Doctor information             
                                     */    
                                    $doctors_info=get_doctors_info('doctors');?>
                                    <?php foreach ($doctors_info as $doctors): ?>
                                    <tr role="row" class="odd">
                                        <td style="width:10%;"><img style="width:200px;" src="../admin/uploads/<?php echo $doctors['profile_pic'];?>"></td>
                                        <td>
                                            <h4><?php echo $doctors['fullname']; ?></h4>
                                            <p><?php echo $doctors['designation']; ?></p>
                                            <p><?php echo $doctors['degree']; ?></p>
                                            <p><?php echo $doctors['specialty']; ?></p>
                                            <p><?php echo $doctors['email_address']; ?></p>
                                            <p><strong>Appointment Time: From </strong><?php echo $doctors['apoint_time']; ?></p>

                                            
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-success submit-btn no-radius" data-toggle="modal" data-target="#confirmpopup_security<?php echo $doctors['doctor_id']; ?>">Appointment</a>                                           
                                        </td>
                                <div id="confirmpopup_security<?php echo $doctors['doctor_id']; ?>" class="modal fade in" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content row">
                                            <div class="modal-header custom-modal-header">
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                <h4 class="modal-title">Appointment</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="client-registation" action="appointment_process.php" method="POST">
                                                    <div class="form-group">                                                                                                                                                                  
                                                            <input type="hidden" name="doctor_id" value="<?php echo $doctors['doctor_id']; ?>" />
                                                            <input type="hidden" name="user_id" value="<?php echo $user_id;?>" />
                                                            <label>Disease</label>
                                                            <input name="disease" type="text" class="form-control"/>
                                                    </div>
                                                    <div class="form-group form_costom_primary">
                                                        <div class="form-group form_costom_info">
                                                            <label>Disease Description</label>
                                                            <textarea name="description" id="" class="form-control" cols="15" rows="8"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form_costom_primary">
                                                        <div class="form-group form_costom_info">
                                                            <label>Date of Appointment</label>
                                                            <input type='date' name='appoint_date'>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <input type="submit" name="submit" class="btn btn-primary submit-btn pull-right" value="Appointment">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>                               
                                </tr>
                            <?php endforeach; ?>
                                    
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
