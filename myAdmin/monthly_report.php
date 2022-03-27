<?php 
ob_start();
?>
<?php include 'header.php' ?>

<?php 
if(isset($_SESSION['user'])){

?>


<div class=" container-fluid">
<div class="row">
  <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
                      <div class="card-header"><strong>Report by Month</strong><button onclick="printDiv('printMe')" class="pull-right"><i class="fa fa-print" style="font-size:26px;color:red"></i></button></div>
                        <div class="card-body card-block">
                            <form method="post" action="monthly_report.php">
                                  <div class="row">
                                  <div class="form-group col-md-6">
                                    <label>Enter Month:</label>
                                    <select class="form-control" id="month" name="month">
                                      <option value="1">January</option>
                                      <option value="2">February</option>
                                      <option value="3">March</option>
                                      <option value="4">April</option>
                                      <option value="5">May </option>
                                      <option value="6">June</option>
                                      <option value="7">July</option>
                                      <option value="8">August</option>
                                      <option value="9">september</option>
                                      <option value="10">October</option>
                                      <option value="11">November</option>
                                      <option value="12">December</option>
                                    </select>
                                  </div>
                                   <div class="form-group col-md-6">
                                    <label>Enter Year:</label>
                                    <select class="form-control" id="year" name="year">
                                      <option value="2017">2017</option>
                                      <option value="2018">2018</option>
                                      <option value="2019">2019</option>
                                      <option value="2020">2020</option>
                                      <option value="2021">2021</option>
                                      <option value="2022">2022</option>
                                      <option value="2023">2023</option>
                                      <option value="2024">2024</option>
                                      <option value="2025">2025</option>
                                      <option value="2026">2026</option>
                                      <option value="2027">2027</option>
                                      <option value="2028">2028</option>
                                    </select>
                                  </div>
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

<?php 

  if (isset($_POST["submit"])) {
    
    $month = $_POST['month'];
    $year = $_POST['year']; 
  $query = "SELECT * from ((select  date, SUM(expense_amount) expense_amount from expense group by date) as a left join (select  date, SUM(bottle) bottle, SUM(total) total, SUM(due) due from    dailyEntry group by date) as b on a.date = b.date) where month(b.date)=? AND YEAR(b.date)=?";

    $date_info=[$month,$year];
    $result=$database->select($query,$date_info);

  $sum_due = false;
  $sum_total = false;
  $total_bottle = false;
  $total_cash = false;
  $expense = false;
  $day_saving = false;

  ?>
<div class="container" id="printMe">
<div class="card-header"><strong>CURRENT MONTH REPORT</strong></div>
  <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <center>
                        <div class="card-body table-responsive-sm">
                          <table id="bootstrap-data-table" class="table table-striped table-bordered table-responisve">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Total Bottle</th>
                                <th>Total</th>
                                <th>Due total</th>
                                <th>Cash in Hand</th>
                                <th>Expense</th>
                                <th>Day Saving</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as  $value) {
                              $cash = $value["total"] - $value["due"];
                              $saving = $cash - $value["expense_amount"];

                              ?>
                              <tr>
                                <td><?php echo $value["date"]; ?></td>
                                <td><?php echo $value["bottle"]; ?></td>
                                <td><?php echo $value["total"]; ?></td>
                                <td><?php echo $value["due"]; ?></td>
                                <td><?php echo $cash; ?></td>
                                <td><?php echo $value["expense_amount"]; ?></td>
                                <td><?php echo $saving; ?></td>
                                
                                <?php   

                                  $sum_due += $value["due"];
                                  $sum_total += $value["total"];
                                  $total_bottle += $value["bottle"];
                                  $total_cash += $cash;
                                  $expense += $value["expense_amount"];
                                  $day_saving += $saving;

                                }   
                                ?>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        
                        <div class="table-responisve">
                          <table id="bootstrap-data-table" class="table table-borderless table-responisve" style="width: 100%">
                            <thead>
                              <tr>
                                <th class="text-right">TOTAL BOTTLES</th>
                                <th class="text-center"><?php
                                echo $total_bottle;
                                  ?></th>
                               
                              </tr>
                              <tr>
                                <th class="text-right">TOTAL AMOUNT</th>
                                <th class="text-center"><?php
                                echo $sum_total;
                                  ?></th>
                               
                              </tr>
                               <tr>
                                <th class="text-right">TOTAL DUE</th>
                                <th class="text-center"><?php
                                echo $sum_due;
                                  ?></th>
                               
                              </tr>
                              <tr>
                                <th class="text-right">TOTAL CASH</th>
                                <th class="text-center"><?php
                                echo $total_cash;
                                  ?></th>
                               
                              </tr>
                              <tr>
                                <th class="text-right">TOTAL EXPENSE</th>
                                <th class="text-center"><?php
                                echo $expense;
                                  ?></th>
                               
                              </tr>
                              <tr>
                                <th class="text-right">TOTAL SAVING</th>
                                <th class="text-center"><?php
                                echo $day_saving;
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
  <?php }  }?>
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