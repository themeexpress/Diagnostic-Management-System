<?php include('includes/header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Pathology Test Information    
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Pathology Test Information</li>        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
            <!--Session Message-->
            <?php if (isset($_SESSION['msg'])): ?>
                <div class="alert alert-warning">
                  <?php echo $_SESSION['msg']; ?>
                </div>
             <?php    unset($_SESSION["msg"]);
              endif;
              ?>
              <h3 class="box-title">Add Pathology Test Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="add_pathology_process.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="fullname">Test Name</label>
                  <input type="text" class="form-control" name="test_name" placeholder="Test Name" required />
                              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name='add_pathology_submit'>Search</button>
              </div>
            </form>
            <!--invoice Div start-->
            <div style="height:300px; border:1px solid #d1d1d1;">
              <button type="button" class="btn btn-primary">Print the Invoice</button>
            
            </div>
            <!--invoice div end-->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-2"></div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include('includes/footer.php');?>