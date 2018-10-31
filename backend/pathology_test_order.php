<?php include('usersincludes/header.php');?>
<div class="overlay"><div class="loader"></div></div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Pathology Test Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Pathology Test New Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-primary" style="box-shadow:0 0 25px 0 lightgray;">
            <div class="box-header with-border">
            <!--Session Message-->
            <?php if (isset($_SESSION['msg'])): ?>
                <div class="alert alert-warning">
                  <?php echo $_SESSION['msg']; ?>
                </div>
             <?php    unset($_SESSION["msg"]);
              endif;
              ?>
              <h3 class="box-title">Pathology Test New Order</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="get_order_data" onsubmit="returns false">
              <div class="box-body">
                <div class="form-group row">
                  <label for="fullname" class="col-sm-3 text-right">Order Date</label>
                  <div class="col-sm-6">
                    <input type="text" readonly class="form-control form-control-sm" name="order_date" id="order_date" value="<?php echo date("Y-d-m");?>" required />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="customer_id" class="col-sm-3 text-right">Customer ID <span>*</span></label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" id="customer_id" name="customer_id" required />
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
              </div>
              <!--item include div-->
              <div class="panel panel-default">
                  <!-- Default panel contents -->
                  <div class="panel-heading">Make a Order List</div>
                  <div class="panel-body">
                      <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Test Name</th>                            
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody id="invoice_item">
                          <!-- <tr>
                            <td><b id="number">1</b></td>
                            <td>
                              <select name="pid[]" class="form-control form-control-sm">
                                <option>Washing Machine</option>
                              </select>
                            </td>
                            <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>
                            <td><input name="qty[]" type="text" class="form-control form-control-sm"></td>
                            <td><input name="price[]" type="text" class="form-control" readonly></td>
                            <td>TK. 1502</td>
                          </tr> -->
                        </tbody>
                      </table>
                      <center style="padding:10px;"><button id="add" class="btn btn-success">Add Item</button>
                       <button id="remove" class="btn btn-danger">Remove</button></center>
                    </div>
                  </div>

                  <!-- Table -->
              </div>
              <div class="form-group row">
                <label for="sub_total" class="col-sm-3 text-right">Sub Total</label>
                <div class="col-sm-6">
                  <input type="text" readonly class="form-control form-control-sm" name="sub_total" id="sub_total" required />
                </div>
              </div>
              <div class="form-group row">
                <label for="vat" class="col-sm-3 text-right">VAT (15%)</label>
                <div class="col-sm-6">
                  <input type="text" readonly class="form-control form-control-sm" name="vat" id="vat" required />
                </div>
              </div>
              <div class="form-group row">
                <label for="discount" class="col-sm-3 text-right">Discount</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control form-control-sm" name="discount" id="discount" required />
                </div>
              </div>
              <div class="form-group row">
                <label for="net_total" class="col-sm-3 text-right">Net Total</label>
                <div class="col-sm-6">
                  <input type="text" readonly class="form-control form-control-sm" name="net_total" id="net_total" required />
                </div>
              </div>
              <div class="form-group row">
                <label for="paid" class="col-sm-3 text-right">Paid</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control form-control-sm" name="paid" id="paid" required />
                </div>
              </div>
              <div class="form-group row">
                <label for="due" class="col-sm-3 text-right">Due</label>
                <div class="col-sm-6">
                  <input type="text" readonly class="form-control form-control-sm" name="due" id="due" required/>
                </div>
              </div>
              <div class="form-group row">
                <label for="payment_type" class="col-sm-3 text-right">Payment Method</label>
                <div class="col-sm-6">
                  <select name="payment_type" id="payment_type" class="form-control form-control-sm" required>
                    <option value="cash">Cash<option>
                    <option value="debit_c">Debit Card<option>
                    <option value="credit_card">Credit Card<option>
                    <option value="check">Check<option>
                  </select>
                </div>
              </div>
              <center>
                <input type="submit" class="btn btn-info" name="order_form" id="order_form" value="Order">
                <input type="submit" class="btn btn-success hide" name="print_invoice" id="print_invoice" value="Print Invoice">
              </center>

            </form>

          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-1"></div>
        <!--/.col (left) -->

      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include('usersincludes/footer.php');?>
