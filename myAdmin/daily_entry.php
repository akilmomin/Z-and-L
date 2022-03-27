<?php 
ob_start();
?>
<?php include 'header.php' ?>

<?php 
if(isset($_SESSION['user'])){

     if (isset($_POST["submit"])){
     $date = $_POST['date'];
     $name = $_POST['name'];
     $duepaid = $_POST['duepaid'];
     $amount = $_POST['amount'];
     $bottle = $_POST['bottle'];
     $total = $_POST['amount'] * $_POST['bottle'];

     if ($_POST["duepaid"]== 'due') {
      $due = $total;
      } else {
      $due = 0;
     }
    
        $insert_query="INSERT INTO dailyEntry(date, name, duepaid, amount, bottle, total, due) VALUES(:date,:name,:duepaid,:amount, :bottle, :total, :due)";
          $daily_info=[$date,$name,$duepaid,$amount,$bottle,$total, $due];
          $database->insert($insert_query,$daily_info);
           header("Location: daily_entry.php");
     }
?>
<div class="container-fluid">
<div class="container">
<div class="row">
  <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
                      <div class="card-header"><strong>DAILY ENTRY</strong></div>
                        <div class="card-body card-block">
                            <form method="post" action="daily_entry.php">
                                  
                                   <div class="form-group">
                                    <label>Current Date:</label>
                                    <input type="date" class="form-control" id="date" name="date" required>
                                  </div>
                                  <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder=" Name" name="name" required>
                                  </div>
                                  <div class="form-group">
                                    <label >Due or Paid:</label>
                                    <select class="form-control" id="duepaid" name="duepaid">
                                      <option value="paid" name="paid">Paid</option>
                                      <option value="due" name="due">Due</option>
                                    </select>
                                  </div>
                                   <div class="form-group">
                                    <label>Amount:</label>
                                    <input type="number" class="form-control" id="amount" placeholder=" Amount" name="amount" required>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label>Bottle:</label>
                                    <input type="number" class="form-control" id="bottle" placeholder="Bottle" name="bottle" required>
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
$query = "SELECT * FROM dailyEntry  WHERE date = CURRENT_DATE() order by id";
  $result=$database->select($query);
 $sum = false;
?>
<div class="container" id="printMe">
  <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <center>
                        <div class="card-body table-responsive-sm">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered table-responisve w-auto" style="width: 100%">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Due / Paid</th>
                                <th>Amount</th>
                                <th>Bottle</th>
                                <th>Total</th>
                                <th>Action</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as  $value) {
                                ?>
                              <tr>
                                <td><?php echo $value["date"]; ?></td>
                                <td><?php echo $value["name"]; ?></td>
                                <td><?php echo $value["duepaid"]; ?></td>
                                <td><?php echo $value["amount"]; ?></td>
                                <td><?php echo $value["bottle"]; ?></td>
                                <td><?php echo $value["total"]; ?></td>
                                <td><form method="post" action="update_daily_info.php">
                                  <input type="hidden" name="id" value=<?php echo $value["id"]; ?>>
                                  <button type="submit" name="submit" class="btn-info"><i class="fa fa-edit" style="font-size:26px"></i> </button>
                                  </form>
                                </td>
                                <?php 

                                $sum += $value["total"];
                                ?>
                              </tr>
                              <?php  } ?>
                            </tbody>
                          </table>
                        </div>
                        

                          <?php 
                          $query1 = "SELECT * FROM dailyEntry  WHERE date = CURRENT_DATE() AND duepaid = 'due' order by id";
                            $result1=$database->select($query1);
                           $sum_due = false;
                          ?>

                        <div class="table-responisve">
                          <table id="bootstrap-data-table" class="table table-borderless table-responisve" style="width: 100%">
                            <thead>
                              <tr>
                                <th></th>
                                <th class="text-right">DUE</th>
                                <th class="text-center"><?php
                                foreach ($result1 as $row) { 
                                  $sum_due += $row["total"];
                                }
                                  echo $sum_due;
                                
                                  ?></th>
                               
                              </tr>
                              <tr>
                                <th></th>
                                <th class="text-right">TOTAL</th>
                                <th class="text-center"><?php
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
<script>
  function printDiv(printMe){
    var printContents = document.getElementById(printMe).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>
<?php include 'footer.php' ?>