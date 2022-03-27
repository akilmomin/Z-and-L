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
                  <form method="post" action="daily_report.php">
                        <div class="form-group">
                          <label>Enter Date:</label>
                          <input type="date" name="date" class="form-control">
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

<br>
<?php 

if (isset($_POST['submit'])) {
    $date = $_POST['date'];    
    $query = "SELECT * FROM dailyEntry where date=?";
    $result=$database->select($query,[$date]);
    $sum = false;


  ?>


<div id="printMe">
  <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <center>
                        <div class="card-body table-responsive-sm">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered" >
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Due / Paid</th>
                                <th>Due Amount</th>
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
                                <td style="width:20% "><?php echo $value["date"]; ?></td>
                                <td style="width:20%"><?php echo $value["name"]; ?></td>
                                <td style="width:10% "><?php echo $value["duepaid"]; ?></td>
                                <td style="width:10% "><?php echo $value["due"]; ?></td>
                                <td style="width:15% "><?php echo $value["amount"]; ?></td>
                                <td style="width:10% "><?php echo $value["bottle"]; ?></td>
                                <td style="width:15% "><?php echo $value["total"]; ?></td>
                                <td style="width:10% "><form method="post" action="update_daily_report_info.php">
                                  <input type="hidden" name="id" value=<?php echo $value["id"]; ?>>
                                  <button type="submit" name="submit" class="btn-info"><i class="fa fa-edit" style="font-size:26px"></i> </button>
                                  </form>
                                </td>
                                <?php $sum += $value["total"]; ?>
                              </tr>
                                <?php  } ?>
                            </tbody>
                          </table>

                        <div class="table-responisve">

                          <?php 
                          $query1 = "SELECT * FROM dailyEntry  WHERE date = ? AND duepaid = 'due' order by id";
                            $result1=$database->select($query1,[$date]);
                           $sum_due = false;
                          ?>
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
                                  
                                  }?></th>
                               
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </center>
              </div>
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