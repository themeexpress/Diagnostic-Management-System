<?php include('usersincludes/header.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>User Informatin</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">User Manager</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">User Manager</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <?php 
                            //Get All Doctors info
                            $i=1;
                            $all_users = all_users('all_users'); ?>
                            <thead>                                
                                <tr>
                                    <th>SL.No.</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>User Name</th>
                                    <th>Designation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($all_users as $users):?>
                                <tr>
                                    <td><?php echo $i;$i++;?></td>
                                    <td><?php echo $users['name']; ?></td>
                                    <td><?php echo $users['email']; ?></td>
                                    <td><?php echo $users['user_name'];?></td>
                                    <td><?php echo $users['user_role'];?></td>
                                    <td><button class="btn btn-primary" type="submit">Edit</button>  <button class="btn btn-danger" type="submit">Delete</button></td>
                                </tr>
                                <?php endforeach; ?> 
                            </tbody>
                            <tfoot>
                                <tr>
                                   <th>SL.No.</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>User Name</th>
                                    <th>Designation</th>
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