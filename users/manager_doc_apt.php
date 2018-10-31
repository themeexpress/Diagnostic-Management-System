<?php

include('config.php');

if (isset($_POST['searwithphone'])) {    
   $phone=$_POST['phone'];
   global $db;
   $sql = "SELECT users_info.fullname,users_info.phone,users_info.gender,users_info.age,appointments.disease FROM users_info,appointments where users_info.user_id=appointments.patient_id AND users_info.phone='$phone'";
   $stmt=$db->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<?php include('includes/header.php');?>
<script type="text/javascript">
    window.onload = function() {
  document.getElementById('old_patient').style.display = 'none';
};
    function showHide(){        
        if(document.getElementById('oldPatientSelect').checked){
            document.getElementById('new_patient').style.display='none';
            document.getElementById('old_patient').style.display = 'block';
        }
        else{document.getElementById('old_patient').style.display='block';}

    }
</script>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12 ">
                    <h1 class="page-header">Register and Appointment By Manager</h1>
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
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Doctor Appointment By Manager <label>Old Patient ?</label> <input type="radio" name="oldPatientSelect" id="oldPatientSelect" onclick="showHide();">                          
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="new_patient">                        
                            <form action="new_appoint_by_manager.php" method="post">
                             <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                                <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="fullname" placeholder="Full name" required>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                           
                            <div class="form-group has-feedback">
                                <input type="number" class="form-control" name="age" placeholder="Your Age" required>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                 <select name="gender" id="gender" class="form-control">
                                    <option vlaue="male">Male</option>
                                    <option vlaue="female">Female</option>
                                </select>
                                
                            </div>                             
                            <div class="form-group has-feedback">
                                <select name="doctor_id" class="form-control">
                                <?php $doctors = get_all_doctors('doctors');
                                foreach ($doctors as $doctor){?>                                
                                    <option value="<?php echo $doctor['doctor_id'];?>"><?php echo $doctor['fullname']; ?></option>
                                <?php } ?>
                                <select>
                            </div>
                            
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="disease" placeholder="Disease" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div> 
                          
                            <div class="form-group has-feedback">
                                <input type="date" name="appoint_date" required class="form-control">                                
                            </div> 

                            <div class="row">                               
                                <div class="">
                                <button type="submit" class="btn btn-primary btn-block btn-flat" name="register_new_user">Appoint and Register</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            </form>
                            
                        </div>
                        <!-- /.panel-body -->

                        <!--Old Patient form-->
                     
                        <form action="manager_doc_apt.php" method="POST">
                         <div class="panel-body" id="old_patient"> 
                            <div class="input-group form-group">
                                  <input type="text" class="form-control" placeholder="Search with Phone" name="phone">
                                  <span class="input-group-btn">
                                    <input type="submit" name="searwithphone" class="btn btn-default" value="Search By Phone Number">
                                  </span>
                            </div><!-- /input-group -->  
                        </form>                   
                            <form action="user_reg_process_by_manager.php" method="post">
                             <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="phone" value="<?php if(isset($result['phone'])){echo $result['phone'];} ?>" placeholder="Phone Number" required>
                                <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="fullname" value="<?php if(isset($result['fullname'])){echo $result['fullname'];}?>" placeholder="Full name" required>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                           
                            <div class="form-group has-feedback">
                                <input type="number" class="form-control" name="age" value="<?php if(isset($result['age'])){echo $result['age'];}?>" placeholder="Your Age" required>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="<?php echo $result['gender'];?>"><?php if(isset($result['gender'])){echo $result['gender'];}?></option>
                                    
                                </select>                                
                            </div>
                       
                            <div class="form-group has-feedback">
                                <select name="doctor_id" class="form-control">
                                <?php $doctors = get_all_doctors('doctors');
                                foreach ($doctors as $doctor){?>                                
                                    <option value="<?php echo $doctor['doctor_id'];?>"><?php echo $doctor['fullname']; ?></option>
                                <?php } ?>
                                <select>
                            </div>
                            
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="disease" value="<?php if(isset($result['disease'])){echo $result['disease'];}?>" placeholder="Disease" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div> 
                            
                            <div class="form-group has-feedback">
                                <input type="date" name="appoint_date" required class="form-control">                                
                            </div> 

                            <div class="row">                               
                                <div class="">
                                <button type="submit" class="btn btn-primary btn-block btn-flat" name="register_user">Appoint and Register</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            </form>
                            
                        </div>
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
   

</body>

</html>
