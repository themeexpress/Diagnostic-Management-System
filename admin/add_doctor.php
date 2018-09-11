<?php include('includes/header.php');?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Doctor Information        
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Doctor information</li>        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Doctor Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="add_process.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="fullname">Full Name</label>
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required />
                </div>
                 <div class="form-group">
                  <label for="designation">Designation</label>
                  <input type="text" class="form-control" name="designation" placeholder="Designation" required />
                </div>
                 <div class="form-group">
                  <label for="degree">Degree</label>
                  <input type="text" class="form-control" name="degree" placeholder="Degree">
                </div>
                 <div class="form-group">
                  <label for="specialty">Specialty</label>
                  <input type="text" class="form-control" name="specialty" placeholder="Specialty">
                </div>
                 <div class="form-group">
                  <label for="work_place">Working Place</label>
                  <input type="text" class="form-control" name="work_place" placeholder="Working Place">
                </div>
                 <div class="form-group">
                  <label for="email_address">Email address</label>
                  <input type="email" class="form-control" name="email_address" placeholder="Enter email">
                </div>
                 <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="number" class="form-control" name="phone" placeholder="Phone Number">
                </div>
                 <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" name="address" placeholder="Address">
                </div>                
                <div class="form-group">
                  <label for="profile_pic">Profile Picture</label>
                  <input type="file" name="profile_pic">
                </div>
                <div class="form-group">
                  <label for="apoint_time">Appointment Time</label>
                  <input type="text" class="form-control" name="apoint_time" placeholder="Appointment Time">
                </div>
                <div class="form-group">
                  <label for="limit_of_patient">Limit of patient</label>
                  <input type="number" class="form-control" name="limit_of_patient" placeholder="Patient limit in a Day">
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name='add_doctor_submit'>Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-3"></div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include('includes/footer.php');?>