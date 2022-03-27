<?php 
ob_start();
?>
<?php include 'header.php' ?>

<?php 
if(isset($_SESSION['user'])){
  if(isset($_POST['id'])){
  $id = $_POST['id'];
  $query = "SELECT * FROM expense where id=?" ;
  $result=$database->select($query,[$id]);

}
?>
<div class="row">
  <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
                      <div class="card-header"><strong>UPDATE EXPENSE DETAIL</strong><a href="<?php echo 'expense.php' ?>"><button class="btn btn-info float-right"> Back to list</button></a></div>
                        <div class="card-body card-block">
                        <?php  foreach($result as $row)  { ?>
                            <form method="post" action="update_expense.php">
                                 
                                   <div class="form-group">
                                    <label>Date:</label>
                                    <input type="date" class="form-control" id="date" required placeholder="Date:" name="date" value=<?php echo $row['date']; ?>>
                                  </div>
                                  <div class="form-group">
                                    <label>Expense:</label>
                                    <select class="form-control" id="expense" name="expense_type" value=<?php echo $row['expense_type']; ?>>
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
                                    <label >Vendor:</label>
                                    <input type="text" class="form-control" id="vendor" required placeholder="Vendor" name="vendor" value=<?php echo $row['vendor']; ?>>
                                  </div>
                                   <div class="form-group">
                                    <label>Amount:</label>
                                    <input type="number" class="form-control" id="amount" required placeholder="Amount" name="expense_amount" value=<?php echo $row['expense_amount']; ?>>
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