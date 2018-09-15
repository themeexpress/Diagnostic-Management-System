<?php include('includes/header.php'); ?>    
    <!--//banner -->
    <div class="banner_inner_content_agile_w3l">	
    </div>
    <div class="container">
    <h2 style="padding:20px;">Our Specialist Doctors List</h2>
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
<?php include('includes/footer.php'); ?>

