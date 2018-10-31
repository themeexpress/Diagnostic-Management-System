<?php include('usersincludes/header.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Pathology Test Informatin</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">Pathology Test</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Pathology Test</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <?php 
                            //Get All Doctors info
                            $i=1;
                            $all_pathology_test = all_pathology_test('pathology_test_info'); ?>
                            <thead>                                
                                <tr>
                                    <th>SL.No.</th>
                                    <th>Test Name</th>
                                    <th>Reporting Time</th>
                                    <th>Test Price</th>                                    
                                    <th>Actions</th>
                                </tr>

                            </thead>
                            <tbody>
                            <?php foreach($all_pathology_test as $pathology_test):?>
                                <tr>
                                    <td><?php echo $i;$i++;?></td>
                                    <td><?php echo $pathology_test['test_name']; ?></td>                                    </td>
                                    <td><?php echo $pathology_test['reporting_time']; ?></td>
                                    <td><?php echo $pathology_test['test_price'];?>"></td>                                   
                                    <td><button class="btn btn-primary" type="submit">Edit</button>  <button class="btn btn-danger" type="submit">Delete</button></td>
                                </tr>
                                <?php endforeach; ?> 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL.No.</th>
                                    <th>Test Name</th>
                                    <th>Reporting Time</th>
                                    <th>Test Price</th>                                    
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