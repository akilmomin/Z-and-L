<?php 
ob_start();
?>
<?php include 'header.php' ?>

<?php 
if(isset($_SESSION['user'])){

     if (isset($_POST["submit"])){
     $date = $_POST['date'];
     $from_date = $_POST['from_date'];
     $to_date = $_POST['to_date'];
     $amount = $_POST['amount'];

    
        $insert_query="INSERT INTO bankDeposit(date, from_date, to_date, amount) VALUES(:date,:from_date,:to_date,:amount)";
          $cust_info=[$date,$from_date,$to_date,$amount];
          $database->insert($insert_query,$cust_info);
           header("Location: deposit.php");
     }
?>
<div class="container-fluid">
<div class="container">
<div class="row">
  <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
                      <div class="card-header"><strong>DEPOSIT DETAIL</strong></div>
                        <div class="card-body card-block">
                            <form method="post" action="deposit.php">
                                  
                                   <div class="form-group">
                                    <label>Current Date:</label>
                                    <input type="date" class="form-control" id="date" placeholder="Customer Date" name="date" required>
                                  </div>
                                  <div class="form-group">
                                    <label >From Date:</label>
                                    <input type="date" class="form-control" id="from-date" placeholder="From Date" name="from_date" required>
                                  </div>
                                   <div class="form-group">
                                    <label>To Date:</label>
                                    <input type="date" class="form-control" id="date" placeholder="To Date" name="to_date" required>
                                  </div>
                                   <div class="form-group">
                                    <label>Amount:</label>
                                    <input type="number" class="form-control" id="amount" placeholder="Deposit Amount" name="amount" required>
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
$query = "SELECT * FROM bankDeposit WHERE MONTH(date) = MONTH(CURRENT_DATE()) order by id";
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
                                
                                <th>Date</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Amount</th>
                                <th>Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as  $value) {
                                ?>
                              <tr>
                               
                                <td><?php echo $value["date"]; ?></td>
                                <td><?php echo $value["from_date"]; ?></td>
                                <td><?php echo $value["to_date"]; ?></td>
                                <td><?php echo $value["amount"]; ?></td>
                                <td><form method="post" action="update_deposit_info.php">
                                  <input type="hidden" name="id" value=<?php echo $value["id"]; ?>>
                                  <button type="submit" name="submit"><i class="fa fa-edit" style="font-size:26px;color:red"></i> </button>
                                  </form>
                                </td>
                                <?php 

                                $sum += $value["amount"];
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
  <div class="col-md-1"></div>
</div>
</div>
</div>
<?php }  ?>
<?php include 'footer.php' ?>