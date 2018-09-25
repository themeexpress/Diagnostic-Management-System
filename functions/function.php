<?php
//set My PDO connection Here
$hostname = "localhost";
$db_name = "diagnostic";
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
    $result = $stmt->rowCount();
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

function appointments_info(){
    global $db;
    $sql = "SELECT doctors.doctor_id,doctors.fullname,doctors.email_address,users_info.user_id, users_info.fullname,users_info.phone,
    appointments.disease, appointments.description,appointments.appoint_date
    FROM doctors,appointments,users_info
    WHERE doctors.doctor_id=appointments.doctor_id AND
    appointments.patient_id=users_info.user_id";
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
    //  $rows=array();
    //  if($stmt->rowCount()>0){
    //      while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    //          $rows[]=$row;
    //      }
    //      return $rows;

    //  }
     return $result;

}


//redirect function

function redirect_to($location){
            header('Location:'.$location);
        }








    function noAccessIfLoggedIn()
    {
        if (isset($_SESSION['user-type'])) {
            noAccessForNormal();
            noAccessForAdmin();
            noAccessForClerk();
            noAccessForDoctor();
        }
    }

    function noAccessIfNotLoggedIn()
    {
        if (!isset($_SESSION['user-type'])) {
            echo '<script type="text/javascript">window.location = "index.php"</script>';
        }
    }

?>
