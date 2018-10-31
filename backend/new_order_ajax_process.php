<?php
include('../functions/function.php');
/*Order processing with ajax data*/

if(isset($_POST['getNewOrderItem'])){
    $allRecords=getAllPatholotyRecords();
   
    ?>
    <tr>
        <td><b class="number">1</b></td>
        <td>
        <select name="pid[]" class="form-control form-control-sm pid" required >
            <option value="">Choose a Test</option>
        <?php foreach($allRecords as $row){ ?>
            <option value="<?php echo $row['test_id'];?>"><?php echo $row['test_name']; ?></option>
        <?php } ?>
        </select>
        </td>        
        <td><input name="qty[]" type="text" class="form-control form-control-sm qty" readonly></td>
        <td><input name="test_price[]" type="text" class="form-control price" readonly></td>
        <td><input name="test_name[]" type="hidden" class="form-control form-control-sm test_name"></td>
        <td>TK. <span class="amt">0</span></td>
        </tr>
    <?php exit();
    } 
    
    
    //Get Price and qty of one item
    if(isset($_POST["getPriceAndQty"])){
        $singleTestInfo= singleTestInfo($_POST['id']);
        echo json_encode($singleTestInfo);
        exit();

    }   

    //Save New Order Data 
    $ar_price= false;
    $ar_test_name = false;
    if(isset($_POST['order_date']) AND isset($_POST['customer_id'])){      
      
       $order_date = $_POST['order_date'];
       $customer_id= $_POST['customer_id'];

        //Getting Array from Order
       $ar_qty= $_POST["qty"];
       $ar_price=$_POST["test_price"];
       $ar_test_name = $_POST["test_name"];        
    //items
       $sub_total= $_POST['sub_total'];
       $vat=$_POST['vat'];
       $discount=$_POST['discount'];
       $net_total=$_POST['net_total'];
       $paid = $_POST['paid'];
       $due = $_POST['due'];
       $payment_type=$_POST['payment_type'];

        //function 
       echo $store_invoice_data = storeOrderInvoice($order_date,$customer_id,$ar_qty,$ar_price,$ar_test_name,
       $sub_total,$vat,$discount,$net_total,$paid,$due,$payment_type);
    
    }
    
    ?>