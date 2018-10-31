user_add.php<?php include('usersincludes/header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Add Users    
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Add Users</li>        
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
              <h3 class="box-title">Add Different Users</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="add_user_process.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Name" required />
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Email" required />
                </div>
                
                 <div class="form-group">
                  <label for="user_name">User Name</label>
                  <input type="text" class="form-control" name="user_name" placeholder="User Name" required>
                </div>
                 <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" name="password" placeholder="password" required>
                </div>
                <div class="form-group">
                  <label for="password">Select User Role</label>
                  <select name="user_role" id="user_role" class="form-control">
                  	<option value="2">Manager</option>
                  	<option value="3">Salesman</option>
                  	<option value="4">Doctor</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name='add_user'>Add User</button>
              </div>
            </form>
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
 <?php include('usersincludes/footer.php');?>