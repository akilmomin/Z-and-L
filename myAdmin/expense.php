<?php 
ob_start();
?>
<?php include 'header.php' ?>

<?php 
if(isset($_SESSION['user'])){

     if (isset($_POST["submit"])){
     $date = $_POST['date'];
     $expense = $_POST['expense_type'];
     $vendor = $_POST['vendor'];
     $expense_amount = $_POST['expense_amount'];

    
        $insert_query="INSERT INTO expense(date, expense_type, vendor, expense_amount) VALUES(:date,:expense_type,:vendor,:expense_amount)";
          $cust_info=[$date,$expense,$vendor,$expense_amount];
          $database->insert($insert_query,$cust_info);
           header("Location: expense.php");
     }
?>
<div class="container-fluid">
<div class="container">
<div class="row">
  <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
                      <div class="card-header"><strong>EXPENSE DETAIL</strong></div>
                        <div class="card-body card-block">
                            <form method="post" action="expense.php">
                                  
                                   <div class="form-group">
                                    <label>Current Date:</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                  </div>
                                  <div class="form-group">
                                    <label >Expense Type:</label>
                                    <select class="form-control" id="expense" name="expense_type">
                                      <option value="water-bill" name="water-bill">Water Bill</option>
                                      <option value="transport" name="transport">Transport</option>
                                      <option value="petrol" name="petrol">Petrol</option>
                                      <option value="electicity" name="electicity">Electricity Bill</option>
                                      <option value="rent" name="rent">Rent</option>
                                      <option value="bottle" name="bottle">Bottle</option>
                                      <option value="pot" name="pot">Pot</option>
                                      <option value="miscellaneous" name="miscellaneous">Miscellaneous</option>
                                      <option value="none" name="none">None</option>
                                    </select>
                                  </div>
                                   <div class="form-group">
                                    <label>vendor:</label>
                                    <input type="text" class="form-control" id="vendor" placeholder="Vendor Name" name="vendor" required>
                                  </div>
                                   <div class="form-group">
                                    <label>Amount:</label>
                                    <input type="number" class="form-control" id="expense_amount" placeholder="Deposit Amount" name="expense_amount" required>
                                  </div>
                                  
                                  <button type="submit" class="btn btn-success" name="submit">Submit</button>

                                  
                                  <!-- <input type="submit" value="Upload Image" name="submit"> -->

                          </form>  
                        </div>
                      </div>
        </div>
      </div>
  <div class="col-md-1"></div>
</div>
</div>

<!-- display the total and list of deposit 
SELECT * FROM bankDeposit WHERE MONTH(date) = MONTH(CURRENT_DATE());
-->
<br>
<?php 
$query = "SELECT * FROM expense WHERE MONTH(date) = MONTH(CURRENT_DATE())";
  $result=$database->select($query);
 $sum = false;
?>
<div class="container">
<div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <center>
                        <div class="card-body table-responsive-sm">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered table-responisve" style="width: 100%">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Expense Type</th>
                                <th>Vendor</th>
                                <th>Amount</th>
                                <th>Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as  $value) {
                                ?>
                              <tr>
                                <td><?php echo $value["id"]; ?></td>
                                <td><?php echo $value["date"]; ?></td>
                                <td><?php echo $value["expense_type"]; ?></td>
                                <td><?php echo $value["vendor"]; ?></td>
                                <td><?php echo $value["expense_amount"]; ?></td>
                                <td><form method="post" action="update_expense_info.php">
                                  <input type="hidden" name="id" value=<?php echo $value["id"]; ?>>
                                  <button type="submit" name="submit"><i class="fa fa-edit" style="font-size:26px;color:red"></i> </button>
                                  </form>
                                </td>
                                <?php 

                                $sum += $value["expense_amount"];
                                ?>
                              </tr>
                              <?php  } ?>
                            </tbody>
                          </table>
                        </div>
                          <div class="table-responisve">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered table-responisve" style="width: 100%">
                            <thead>
                              <tr>
                                <th>TOTAL</th>
                                <th><?php
                                echo $sum;
                                  ?></th>
                               
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </center>
                      </div>
                  </div>
  </div>
</div>
</div>
<?php }  ?>
<?php include 'footer.php' ?>