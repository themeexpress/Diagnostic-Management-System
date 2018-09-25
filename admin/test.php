<?php 
include('../functions/function.php');

$getAllRecords=getAllRecords('pathology_test_info');
echo '<pre>';
print_r($getAllRecords);

foreach($getAllRecords as $rows){
    echo $rows['test_name'];
    echo '<br/>';

}


?>