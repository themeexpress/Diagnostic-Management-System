<?php include('usersincludes/header.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Doctors Informatin</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">Manage doctor</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Manage Doctors</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <?php 
                            //Get All Doctors info
                            $i=1;
                            $all_doctors = get_all_doctors('doctors'); ?>
                            <thead>                                
                                <tr>
                                    <th>SL.No.</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Profile Picture</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($all_doctors as $doctors):?>
                                <tr>
                                    <td><?php echo $i;$i++;?></td>
                                    <td><?php echo $doctors['fullname']; ?></td>                                    </td>
                                    <td><?php echo $doctors['email_address']; ?></td>
                                    <td><img style="width:150px" src="uploads/<?php echo $doctors['profile_pic'];?>"></td>
                                    <td><?php if($doctors['status']==1){
                                    echo "Active" ;
                                    }
                                    else{
                                        echo 'Not Active';
                                    }?></td>
                                    <td><button class="btn btn-primary" type="submit">Edit</button>  <button class="btn btn-danger" type="submit">Delete</button></td>
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
<?php include('usersincludes/footer.php');?>