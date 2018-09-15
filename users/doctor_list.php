<?php include('includes/header.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Specialist Doctors
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Hover Data Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table class="table table-hover">
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
            $doctors_info=get_doctors_info('doctors');
            foreach($doctors_info as $doctors) { ?>
        <tr>
            <td><img style="width:200px;" src="admin/uploads/<?php echo $doctors['profile_pic']; ?>"></td>
            <td><h3><?php echo $doctors['fullname'] ;?></h3>
                <p><?php echo $doctors['designation']; ?></p>
                <p><?php echo $doctors['degree']; ?></p>
                <p><?php echo $doctors['specialty']; ?></p>
                <p><?php echo $doctors['work_place'];?></p>
                <p><?php echo $doctors['email_address'];?></p>
                <p><?php echo $doctors['phone'];?></p>
                <p><?php echo $doctors['email_address'];?></p>
            </td>
            <td><a href="login.php" class="btn btn-primary">Appointment</a> | <a href="#" class="btn btn-primary">Details</a> | <a href="#" class="btn btn-primary">Reviews</a></td>
        
        </tr>
        
            <?php } ?>
       
        </tbody>
    </table> 
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

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