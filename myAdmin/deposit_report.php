<?php 
ob_start();
?>
<?php include 'header.php' ?>

<?php 
if(isset($_SESSION['user'])){

     // if (isset($_POST["submit"])){
     // $date = $_POST['date'];

     //    $insert_query="INSERT INTO bankDeposit(date, from_date, to_date, amount) VALUES(:date,:from_date,:to_date,:amount)";
     //      $cust_info=[$date,$from_date,$to_date,$amount];
     //      $database->insert($insert_query,$cust_info);
     //       header("Location: deposit.php");
     // }
?>
<div class="container container-fluid">
<div class="row">
  <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
                      <div class="card-header"><strong>Report by Month</strong><button onclick="printDiv('printMe')" class="pull-right"><i class="fa fa-print" style="font-size:26px;color:red"></i></button></div>
                        <div class="card-body card-block">
                            <form method="post" action="deposit_report.php">
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

<br>
<?php 

if (isset($_POST['submit'])) {
    $month = $_POST['month'];
    $year = $_POST['year'];    
    $query = "SELECT * FROM bankDeposit where MONTH(date)=? AND YEAR(date)=?";
    $date_info=[$month,$year];
    $result=$database->select($query,$date_info);
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
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Amount</th>
                                
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
                                <?php 

                                $sum += $value["amount"];
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
  <div class="col-md-1"></div>
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