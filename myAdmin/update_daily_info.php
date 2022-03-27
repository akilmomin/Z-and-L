<?php 
ob_start();
?>
<?php include 'header.php' ?>

<?php 
if(isset($_SESSION['user'])){
  if(isset($_POST['id'])){
  $id = $_POST['id'];
  $query = "SELECT * FROM dailyEntry where id=?" ;
  $result=$database->select($query,[$id]);

}
?>
<div class="row">
  <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
                      <div class="card-header"><strong>UPDATE DEPOSIT DETAIL</strong><a href="<?php echo 'daily_entry.php' ?>"><button class="btn btn-info float-right"> Back to list</button></a></div>
                        <div class="card-body card-block">
                        <?php  foreach($result as $row)  {
                           $total = $row['amount'] * $row['bottle'];
                           //echo $total;
                           if ($row["duepaid"] == 'due'){
                            $due = $total;
                          } else {
                            $due = 0;

                           }                    ?>
                            <form method="post" action="update_daily.php">
                                 
                                   <div class="form-group">
                                    <label>Date:</label>
                                    <input type="text" class="form-control" id="date" required placeholder="Date:" name="date" value=<?php echo $row['date']; ?>>
                                  </div>
                                  <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value=<?php echo $row['name']; ?>>
                                  </div>
                                   <div class="form-group">
                                    <label >Due or Paid:</label>
                                    <select class="form-control" id="duepaid" name="duepaid">
                                      <option ><?php echo $row['duepaid']; ?> </option>
                                      <option value="paid" name="paid">Paid</option>
                                      <option value="due" name="due">Due</option>
                                    </select>
                                  </div>
                                   <div class="form-group">
                                    <label>Amount:</label>
                                    <input type="number" class="form-control" id="amount" required placeholder="Amount" name="amount" value=<?php echo $row['amount']; ?>>
                                  </div>
                                  <div class="form-group">
                                    <label>Bottle:</label>
                                    <input type="number" class="form-control" id="bottle" required placeholder="Bottle" name="bottle" value=<?php echo $row['bottle']; ?>>
                                  </div>
                                  <div class="form-group">
                                    <label>Total:</label>
                                    <input type="number" class="form-control" id="total" required readonly placeholder="Total" name="total" value=<?php echo $total; ?>>
                                  </div>
                                  <div class="form-group">
                                    <label>Due:</label>
                                    <input type="number" class="form-control" id="due" required readonly placeholder="Due" name="due" value=<?php echo $due; ?>>
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