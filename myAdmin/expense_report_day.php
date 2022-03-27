<?php 
ob_start();
?>
<?php include 'header.php' ?>

<?php 
if(isset($_SESSION['user'])){

?>

<div class="container-fluid">
<div class="row">
  <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
            <div class="card-header"><strong>Report by Day</strong><button onclick="printDiv('printMe')" class="pull-right"><i class="fa fa-print" style="font-size:26px;color:green"></i></button></div>
              <div class="card-body card-block">
                  <form method="post" action="expense_report_day.php">
                        <div class="form-group">
                          <label>Enter Date:</label>
                          <input type="date" name="date" class="form-control">
                         </div>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                </form>  
              </div>
            </div>
        </div>
      </div>
  <div class="col-md-1"></div>
</div>

<br>
<?php 

if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $query = "SELECT * FROM expense where date=?";
    $result=$database->select($query,[$date]);
    $sum = false;


  ?>


<div class="row" id="printMe">
                <div class="col-md-12">
                    <div class="card">
                    <center>
                        <div class="card-body table-responsive-sm">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered table-responisve" style="width: 100%">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Expense Type</th>
                                <th>Vendor</th>
                                <th>Amount</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as  $value) {
                                ?>
                              <tr>
                                <td><?php echo $value["date"]; ?></td>
                                <td><?php echo $value["expense_type"]; ?></td>
                                <td><?php echo $value["vendor"]; ?></td>
                                <td><?php echo $value["expense_amount"]; ?></td>
                                <?php 

                                $sum += $value["expense_amount"];
                                ?>
                              </tr>
                              <?php   }?>
                              </tbody>
                          </table>
                        </div>
                        <!-- total of amount -->
                        
                      
                        
                        <div class="table-responisve">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered table-responisve" style="width: 100%">
                            <thead>
                              <tr>
                                <th>TOTAL</th>
                                <th><?php
                                echo $sum;
                                  ?></th>
                                <?php   }?>
                              </tr>
                              
                            </thead>
                          </table>
                        </div>
                        </center>
      </div>
  </div>
</div>

<?php } ?>

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