<?php
//set My PDO connection Here
$hostname = "localhost";
$db_name = "diagnostic_manage";
$db_user = "root";
$db_password = "";
define('HOST_NAME', $hostname);
try {
    $db = new PDO("mysql:host=" . HOST_NAME . ";dbname=$db_name", $db_user, $db_password);
   
} catch (PDOException $e) {
    echo $e->getMessage();
}

/*Admin login check*/
function check_login($table = NULL, $email = NULL, $password = NULL) {
    global $db;
    $sql = "SELECT * FROM $table WHERE email='$email' and password='$password' ";

    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


//Check any user login 

function check_users_login($table = NULL,$user_name = NULL,$password = NULL,$user_role = NULL) {
    global $db;
    $sql = "SELECT * FROM $table WHERE user_name='$user_name' and password='$password'AND user_role='$user_role' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//Get Admin data to set session data

function get_data($table = NULL, $Where = NULL, $value = NULL) {
    global $db;
    $sql = "SELECT * FROM $table WHERE $Where='$value' ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


/**Get Actinve doctor information */
function get_doctors_info($doctors){
    global $db;
    $sql = "SELECT * FROM $doctors WHERE status=1 ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
//Get All doctor information
function get_all_doctors($doctors) {
    global $db;
    $sql = "SELECT * FROM $doctors";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
//get all users
function check_login_patient($users_info,$email,$password,$user_role){
    global $db;
    $sql = "SELECT * FROM $users_info where email='$email' AND password='$password' AND $user_role='1'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function check_login_manager($users_info,$email,$password,$user_role){
    global $db;
    $sql = "SELECT * FROM $users_info where email='$email' AND password='$password' AND $user_role='2'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}

function appointments_info(){
    global $db;
    $sql = "SELECT doctors.doctor_id,doctors.fullname,doctors.email_address,users_info.user_id, users_info.fullname,users_info.phone, appointments.disease, appointments.disease_description,appointments.appoint_date FROM doctors,appointments,users_info WHERE doctors.doctor_id=appointments.doctor_id AND appointments.patient_id=users_info.user_id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//Appointment is available or not check
function appointment_check($doctor_id,$appoint_date){
    global $db;
    $sql = "SELECT count(appointment_no) as total_appointment FROM appointments WHERE 
    doctor_id='$doctor_id' AND appoint_date='$appoint_date'";
     $stmt = $db->prepare($sql);
     $stmt->execute();
     $result = $stmt->fetch(PDO::FETCH_ASSOC);
     return $result;
    }
/*Get All records -- Universal Query*/
function getAllRecords($table){
    global $db;
     $sql = "SELECT * FROM $table";
     $stmt = $db->prepare($sql);
     $stmt->execute();
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
     return $result;
}
function getAllPatholotyRecords(){
    global $db;
    $sql = "SELECT * FROM pathology_test_info";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
    return $result; 

}
//Get Single Test Info
function singleTestInfo($id){
    global $db;
    $sql = "SELECT * FROM pathology_test_info WHERE test_id='$id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);    
    return $result; 
}

//Serial patient process

function serial_of_patient($doctor_id,$appoint_date){
    global $db;
    $sql = "SELECT COUNT(patient_id) AS TOTOAL_PATIENT FROM appointments WHERE doctor_id='$doctor_id' AND appoint_date='$appoint_date'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);    
    return $result;
}

/*Appointment History for SESSION user*/
function my_appoint_history($user_id){
    global $db;
    $sql="SELECT doctors.fullname, appointments.appoint_date,appointments.patient_serial, appointments.approved FROM appointments,doctors 
    WHERE doctors.doctor_id=appointments.doctor_id AND appointments.patient_id='$user_id'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
    return $result;
}


//All appoint History of manager 

function all_appoint_history(){
    global $db;
    $sql="SELECT doctors.fullname, appointments.appoint_date,appointments.patient_serial, appointments.approved,users_info.fullname as patient_name FROM appointments,doctors,users_info
    WHERE doctors.doctor_id=appointments.doctor_id AND appointments.patient_id=users_info.user_id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
    return $result;
}





//Store customer order invoice

function storeOrderInvoice($order_date,$customer_id,$ar_qty,$ar_price,$ar_test_name,$sub_total,$vat,$discount,$net_total,$paid,$due,$payment_type){   
  
    global $db;
    $sql = "INSERT INTO `test_invoice` (`customer_id`, `order_date`, `sub_total`, `vat`, `discount`, `net_total`, `paid`, `due`, `payment_type`) 
    VALUES (:customer_id, :order_date, :sub_total, :vat, :discount, :net_total, :paid, :due, :payment_type)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":customer_id", $customer_id); 
    $stmt->bindParam(":order_date", $order_date);
    $stmt->bindParam(":sub_total", $sub_total);
    $stmt->bindParam(":vat", $vat);
    $stmt->bindParam(":discount", $discount);
    $stmt->bindParam(":net_total", $net_total);
    $stmt->bindParam(":paid", $paid);
    $stmt->bindParam(":due", $due);
    $stmt->bindParam(":payment_type", $payment_type);   
    $stmt->execute();
    $invoice_no = $db->lastInsertId();

    if($invoice_no != null ){
        for($i=0; $i<count($ar_test_name); $i++){
            $sql1="INSERT INTO test_invoice_details(invoice_no,test_name,price,qty)
            VALUES (:invoice_no,:test_name,:price,:qty)";
            $stmt2=$db->prepare($sql1);
            $stmt2->bindParam(":invoice_no",$invoice_no);
            $stmt2->bindParam(":test_name",$ar_test_name[$i]);
            $stmt2->bindParam(":price",$ar_price[$i]);
            $stmt2->bindParam(":qty",$ar_qty[$i]);
            $stmt2->execute() or die($stmt2->errorInfo());
        }
        return 'ORDER_COMPLETED';
      
    }

}


//function single invoice
function getInvoice($invoice_no){
    global $db;
    $sql = "SELECT * FROM test_invoice where invoice_no='$invoice_no'";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);    
    return $result;

} 
//test invoice details

function test_invoice_details($invoice_no){
  global $db;
    $sql = "SELECT * FROM test_invoice_details where invoice_no='$invoice_no'";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAlL(PDO::FETCH_ASSOC);    
    return $result;
}

//Get all pathology test Customer   

function pathology_invoice_list(){
    global $db;
    $sql = "SELECT * FROM test_invoice ORDER BY invoice_no DESC";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
    return $result;
}

//get all Pathology Test Info

function all_pathology_test($test_info){
    global $db;
    $sql = "SELECT * FROM $test_info ORDER BY test_id DESC";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
    return $result;

}

//get all users to manage
function all_users($users){
    global $db;
    $sql = "SELECT * FROM $users WHERE user_role!=1 ORDER BY userid DESC";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);    
    return $result;

}


//Patient Logged in or Manager Logged in

function patientOrManagerLoggedin($session_id){
    global $db;
    $sql = "SELECT user_role FROM users_info WHERE user_id='$session_id'";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);    
    return $result;
}



//redirect function

function redirect_to($location){
            header('Location:'.$location);
        }



?>
