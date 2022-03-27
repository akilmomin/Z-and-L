<?php 
ob_start();
?>
<?php include 'header.php' ?>

<?php 
if(isset($_SESSION['user'])){

  $query = "SELECT * from ((select  date, SUM(expense_amount) expense_amount from expense group by date) as a left join (select  date, SUM(bottle) bottle, SUM(total) total, SUM(due) due from    dailyEntry group by date) as b on a.date = b.date) where month(a.date)=month(current_date())";
  $result = $database->select($query);

  $sum_due = false;
  $sum_total = false;
  $total_bottle = false;
  $total_cash = false;
  $expense = false;
  $day_saving = false;

  ?>


<div class="container container-fluid">
<div class="container">
<div class="card-header"><strong>CURRENT MONTH REPORT</strong><button onclick="printDiv('printMe')" class="pull-right"><i class="fa fa-print" style="font-size:26px;color:green"></i></button></div>
  <div class="row" id="printMe">
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
                          </center>
                        </div>
            </div>
    </div>
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