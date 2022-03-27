<?php 
ob_start();
?>
<?php include 'header.php' ?>

<?php 
if(isset($_SESSION['user'])){
  if(isset($_POST['id'])){
  $id = $_POST['id'];
  $query = "SELECT * FROM customer where id=?" ;
  $result=$database->select($query,[$id]);

}
?>
<div class="row">
  <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
                      <div class="card-header"><strong>UPDATE CUSTOMER DETAIL</strong><a href="<?php echo 'customer.php' ?>"><button class="btn btn-info float-right"> Back to list</button></a></div>
                        <div class="card-body card-block">
                        <?php  foreach($result as $row)  { ?>
                            <form method="post" action="update_customer.php">
                                 
                                   <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" class="form-control" id="Name" required placeholder="Name:" name="name" value=<?php echo $row['name']; ?>>
                                  </div>
                                  <div class="form-group">
                                    <label>Address:</label>
                                    <input type="text" class="form-control" id="address" required placeholder="Address" name="address" value=<?php echo $row['address']; ?>>
                                  </div>
                                   <div class="form-group">
                                    <label >Phone:</label>
                                    <input type="tel" class="form-control" id="phone" required placeholder="Phone" maxlength="10" name="phone" value=<?php echo $row['phone']; ?>>
                                  </div>
                                   <div class="form-group">
                                    <label>Deposit:</label>
                                    <input type="number" class="form-control" id="deposit" required placeholder="Deposit" name="deposit" value=<?php echo $row['deposit']; ?>>
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