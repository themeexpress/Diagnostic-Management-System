<?php
include('../functions/function.php');
/*Order processing with ajax data*/

if(isset($_POST['getNewOrderItem'])){
    $allRecords=getAllRecords('pathology_test_info');
    ?>
    <tr>
        <td><b id="number">1</b></td>
        <td>
        <select name="pid[]" class="form-control form-control-sm">
        <?php foreach($allRecords as $row){ ?>
            <option value="<?php echo $row['test_id'];?>"><?php echo $row['test_name']; ?></option>
        <?php } ?>
        </select>
        </td>
        <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>
        <td><input name="qty[]" type="text" class="form-control form-control-sm"></td>
        <td><input name="price[]" type="text" class="form-control" readonly></td>
        <td>TK. <span>0</span></td>
        </tr>
    <?php } 
    
    
    
    ?>