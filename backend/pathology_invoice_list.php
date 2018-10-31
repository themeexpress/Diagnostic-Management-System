<?php include('usersincludes/header.php');?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Patholoty Test Customer</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">Patholoty Test Customer</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Pathology Test Customers</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <?php 
                            //Get All Doctors info
                            $i=1;
                            $pathology_invoice_list = pathology_invoice_list();  
                            //print_r($appointments_info);                          
                            ?>

                            <thead>                                
                                <tr>
                                    <th>SL.No.</th>
                                    <th>Customer Name</th>
                                    <th>Total Amount</th>
                                    <th>Discount</th>
                                    <th>VAT</th>
                                    <th>Order Date</th>                                      
                                    <th>Actions</th>                                  
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($pathology_invoice_list as $invoice):?>
                              <?php ?>
                                <tr>
                                	<?php $invoice_no=$invoice['invoice_no'];?>
                                    <td><?php echo $i;$i++;?></td>                                    
                                    <td><?php echo $invoice['customer_id']; ?></td>
                                    <td><?php echo $invoice['net_total']; ?></td>
                                    <td><?php echo $invoice['discount']; ?></td>
                                    <td><?php echo $invoice['vat']; ?></td>
                                    <td><?php echo $invoice['order_date']; ?></td>                                    
                                    <td><a target="_blank" href="create_test_invoice.php?invoice_no=<?php echo $invoice_no;?>" class="btn btn-primary" >Invoice</a>  
                                     <a href="delete_test_invoice.php?id=<?php echo $invoice_no;?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                                <?php endforeach; ?> 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL.No.</th>
                                    <th>Customer Name</th>
                                    <th>Total Amount</th>
                                    <th>Discount</th>
                                    <th>VAT</th>
                                    <th>Order Date</th>                                      
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