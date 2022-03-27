<?php 
ob_start();
?>
<?php include 'header.php' ?>

<?php 
if(isset($_SESSION['user'])){
  if(isset($_POST['id'])){
  $id = $_POST['id'];
  $query = "SELECT * FROM bankDeposit where id=?" ;
  $result=$database->select($query,[$id]);

}
?>
<div class="row">
  <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
                      <div class="card-header"><strong>UPDATE DEPOSIT DETAIL</strong><a href="<?php echo 'deposit.php' ?>"><button class="btn btn-info float-right"> Back to list</button></a></div>
                        <div class="card-body card-block">
                        <?php  foreach($result as $row)  { ?>
                            <form method="post" action="update_deposit.php">
                                 
                                   <div class="form-group">
                                    <label>Date:</label>
                                    <input type="text" class="form-control" id="date" required placeholder="Date:" name="date" value=<?php echo $row['date']; ?>>
                                  </div>
                                  <div class="form-group">
                                    <label>From Date:</label>
                                    <input type="date" class="form-control" id="from_date" required placeholder="From Date" name="from_date" value=<?php echo $row['from_date']; ?>>
                                  </div>
                                   <div class="form-group">
                                    <label >To Date:</label>
                                    <input type="date" class="form-control" id="date" required placeholder="To Date" name="to_date" value=<?php echo $row['to_date']; ?>>
                                  </div>
                                   <div class="form-group">
                                    <label>Amount:</label>
                                    <input type="number" class="form-control" id="amount" required placeholder="Amount" name="amount" value=<?php echo $row['amount']; ?>>
                                  </div>
                                 
                                 <input type='hidden' name="id" value=<?php echo $row['id']; ?>>
                                  <button type="submit" class="btn btn-success" name="submit">Submit</button>

                                  
                                  <!-- <input type="submit" value="Upload Image" name="submit"> -->

                          </form> 
                          <?php } ?> 
                        </div>
                      </div>
        </div>
      </div>
  <div class="col-md-1"></div>
</div>

<?php } ?>
<?php include 'footer.php' ?>