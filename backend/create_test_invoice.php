<?php
include('../functions/function.php');

//get invoice no
$invoice_no = $_GET['invoice_no'];

//get details of invoice
$test_invoice_details=test_invoice_details($invoice_no);

//get invoice data and customer
$get_test_invoice=getInvoice($invoice_no);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test Invoices</title>
	<style type="text/css">
	#details{
		    border-collapse: collapse;
		}

		#details, #details th, #details td {
		    border: 1px solid black;
		}
	@media print {
  #printPageButton {
    display: none;
  }

  .invoice_table{width: 500px; margin: 10px auto;}

	</style>
	<script>		
	function printdoc() {
    window.print();
	}
</script>
</head>
<body>
	<div style="width: 600px; margin:10px auto;">
	<h1 style="text-align: center">Diagnostic Management System</h1>
	<hr>
	<br>
	<div class="invoice_table">

		<table>
			<tr>			
				<td><b>Customer Name: </b></td> <td><?php echo $get_test_invoice['customer_id'] ?></td>			
			</tr>
			<tr>
				<td><b>Order Date: </b></td><td><?php echo $get_test_invoice['order_date'] ?></td>
			
			</tr>		
		</table>
		<br><br>

		<table border="1" width="500px; margin:10px auto;" id="details">
			
		<tr>
			<th>Serial No</th>
			<th>Test Name</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
		<?php
		$i=1;
		 foreach ($test_invoice_details as $row) {?>
		
		<tr>
			<td><?php echo $i;$i++;?></td>
			<td><?php echo $row['test_name'];?></td>
			<td><?php echo $row['qty'];?></td>
			<td><?php echo $row['price'];?></td>
		</tr>
		<?php }?>


		</table>
		<br><br>


		<button id="printPageButton" onclick="printdoc()" style="background: Green; padding: 10px 20px;">Print Invoice</button>

		<br><br><br>
		<hr style="width: 20%; text-align: right; float: right; padding-right: 20px;">
		<p style="text-align: right;margin: 25px;">Signature</p>
		</div>
</div>
	
</body>
</html>
