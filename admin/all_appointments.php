<?php include('includes/header.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Appointment Informatin</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">Appointments</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Appointments</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <?php 
                            //Get All Doctors info
                            $i=1;
                            $appointments_info = appointments_info();                             
                            ?>
                            
                            <thead>                                
                                <tr>
                                    <th>SL.No.</th>
                                    <th>Doctor Name</th>
                                    <th>Email</th>
                                    <th>Patient Name</th>
                                    <th>Patient Phone</th>
                                    <th>Apoint Date</th>
                                    <th>Disease</th>
                                    <th>Actions</th>
                                    <!--( [doctor_id] => 1  [user_id] => 5 ) [1] => Array ( [doctor_id] => 1 [fullname] => Imran Hossain [email_address] => lutfor@gmail.com [user_id] => 6 [phone] => 1723276089 [disease] => Fever [description] => Fever from 5 days [appoint_date] => 2018-09-22 00:00:00 ) [2] => Array ( [doctor_id] => 1 [fullname] => Imran Hossain [email_address] => lutfor@gmail.com [user_id] => 6 [phone] => 1723276089 [disease] => Chest Pain [description] => chest pain and joint pain [appoint_date] => 2018-09-28 00:00:00 ) [3] => Array ( [doctor_id] => 1 [fullname] => Imran Hossain [email_address] => lutfor@gmail.com [user_id] => 6 [phone] => 1723276089 [disease] => Chest Pain 4 [description] => Chest Pain 4 [appoint_date]-->
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($appointments_info as $appointments):?>
                              <?php ?>
                                <tr>
                                    <td><?php echo $i;$i++;?></td>
                                    <td><?php echo $appointments['fullname']; ?></td>                                    </td>
                                    <td><?php echo $appointments['email_address']; ?></td>
                                    <td><?php echo $appointments['fullname']; ?></td>
                                    <td><?php echo $appointments['phone']; ?></td>
                                    <td><?php echo $appointments['appoint_date']; ?></td>
                                    <td><?php echo $appointments['disease']; ?></td>
                                    <td><button class="btn btn-primary" type="submit">Confirm</button>  <button class="btn btn-danger" type="submit">Delete</button></td>
                                </tr>
                                <?php endforeach; ?> 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL.No.</th>
                                    <th>Full Name</th>
                                    <th>Email(s)</th>
                                    <th>Profile Picture</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('includes/footer.php');?>